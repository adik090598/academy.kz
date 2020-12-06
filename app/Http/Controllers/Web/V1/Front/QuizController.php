<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\SubmitQuizWebRequest;
use App\Models\Entities\Answer;
use App\Models\Entities\Category;
use App\Models\Entities\Core\Role;
use App\Models\Entities\Question;
use App\Models\Entities\Quiz;
use App\Models\Entities\QuizResultAnswer;
use App\Models\Entities\Subject;
use App\Models\Entities\Order;
use App\Models\Entities\QuizResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuizController extends WebBaseController
{
    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')
            ->where('role_id', Auth::user()->role_id)
            ->where('category_id', Category::TESTS)
            ->where('start_date', null)
            ->where('end_date', null)
            ->withCount('questions')
            ->has('questions')
            ->get();

        $subjects = Subject::all();
        return $this->frontPagesView('quiz.index', compact('quizzes', 'subjects'));
    }

    public function olympics() {
        $now = now();
        $quizzes = Quiz::where('start_date', '<=', $now)
            ->where('role_id', Auth::user()->role_id)
            ->where('category_id', Category::OLYMPICS)
            ->where('end_date', '>=', $now)
            ->withCount('questions')
            ->has('questions')
            ->get();
        return $this->frontPagesView('quiz.olympics', compact('quizzes'));
    }

    public function competitions() {
        $quizzes = Quiz::where('category_id', Category::COMPETITION)
            ->with('documents')
            ->get();
        return $this->frontPagesView('quiz.competition', compact('quizzes'));
    }

    public function quiz(Request $request)
    {
        $quiz = $this->checkQuiz($request->id, true, false);
        return $this->frontPagesView('quiz.single', compact('quiz'));
    }

    public function pass(Request $request)
    {
        $quiz = $this->checkQuiz($request->id, true);

        Order::create([
            'status' => Order::PROCESS,
            'quiz_id' => $quiz->id,
            'user_id' => Auth::id(),
            'price' => $quiz->price,
//                'transaction_id' => 1
        ]);
        $this->makeToast('success', 'Қабылданды!');
        return redirect()->route('profile.quizzes');
    }

    public function start(Request $request)
    {
        $order = Order::where('id', $request->id)
            ->where('status', Order::ACCEPTED)
            ->first();

        if (!$order) {
            throw new WebServiceExplainedException('У вас нету оплаты по данному запросу');
        }
        $quiz_result = QuizResult::where('order_id', $order->id)->first();
        if ($quiz_result) {
            throw new WebServiceExplainedException('У вас не осталось попыток!');
        }
        $quiz = $this->checkQuiz($order->quiz_id, true);
        foreach ($quiz->questions as $question) {
            $question->answers = $question->hiddenAnswers;
        }//        $check_exist = Session::get('');
       // $quiz = Quiz::find($order->quiz_id)->with('questions.answers')->get();
//        session()->forget('order'.$order->id);
        $duration = session()->get('order'.$order->id);
        if($duration) {
            $quiz->duration = Carbon::now()->diffInSeconds($duration,false);
            $quiz->duration = round($quiz->duration / 60, 2);
        }
        else {
            session()->put('order'.$order->id, Carbon::now()->addMinutes($quiz->duration));
        }
        return $this->frontPagesView('quiz.pass', compact('quiz', 'order'));
    }

    public function submit(SubmitQuizWebRequest $request)
    {
        $user_id = Auth::id();
        $user = Auth::user();
        $answer_ids = [];
        $result = 0;

        $order = Order::where('user_id', $user_id)
            ->where('quiz_id', $request->quiz_id)
            ->where('status', Order::ACCEPTED)
            ->orderBy('updated_at', 'desc')
            ->first();
        if (!$order) {
            throw new WebServiceExplainedException('У вас нету оплаты по данному запросу');
        }
        $quiz_result = QuizResult::where('order_id', $order->id)->first();
        if ($quiz_result) {
            throw new WebServiceExplainedException('У вас не осталось попыток!');
        }

        if ($request->answers) {
            $answer_ids = explode(',', $request->get("answers"));
        }
        if (empty($answer_ids)) {
            throw new WebServiceExplainedException('Системная ошибка!');
        }
        $quiz_questions_ids = Question::where('quiz_id', $request->quiz_id)->withTrashed()->get()->pluck('id');
        $quiz_answers_ids = Answer::whereIn('question_id', $quiz_questions_ids)->withTrashed()->get()->pluck('id');
        $quiz_answers_ids = $quiz_answers_ids->toArray();
        foreach ($answer_ids as $answer_id) {
            if (!in_array($answer_id, $quiz_answers_ids)) {
                throw new WebServiceExplainedException('Ответы не относятся к этому тесту!');
            }
        }

        $answers = Answer::whereIn('id', $answer_ids)->with('question.quiz')->get();

        $selected_answers = [];
        try {
            DB::beginTransaction();
            $now = now();
            $quiz_result = QuizResult::create([
                'user_id' => $user_id,
                'quiz_id' => $request->quiz_id,
                'order_id' => $order->id,
                'name' => $user->name,
                'surname' => $user->surname,
                'father_name' => $user->father_name,
                'city' => $user->school->area->city->name,
                'area' => $user->school->area->name,
                'region' => $user->school->area->city->region->name,
                'school' => $user->school->name,
                'class_letter' => $user->class_letter,
                'class_number' => $user->class_number,
                'certificate_type' => QuizResult::DEFAULT,
                'result' => 0,
                'all_score' => 0,

            ]);

            foreach ($quiz_answers_ids as $answer_id) {
                $answer = $answers->where('id', $answer_id)->first();
                if ($answer) {
                    $selected_answers[] = [
                        'answer_id' => $answer->id,
                        'quiz_result_id' => $quiz_result->id,
                        'is_right' => $answer->is_right,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                    if ($answer->is_right) {
                        $result++;
                    }
                }
            }
            QuizResultAnswer::insert($selected_answers);
            $quiz_result->result = $result;
            $quiz = Quiz::where('id', $request->quiz_id)->with('questions')->first();
            $certificate_type = QuizResult::DEFAULT;
            $certificate_path = $quiz->default_certificate;
            if($user->role_id == Role::LEARNER_ID) {
                if ($result >= $quiz->third_place && $result < $quiz->second_place) {
                    $certificate_type = QuizResult::THIRD_PLACE;
                    $certificate_path = $quiz->third_place_certificate;
                } else if ($result >= $quiz->second_place && $result < $quiz->first_place) {
                    $certificate_type = QuizResult::SECOND_PLACE;
                    $certificate_path = $quiz->second_place_certificate;
                } else if ($result >= $quiz->first_place) {
                    $certificate_type = QuizResult::FIRST_PLACE;
                    $certificate_path = $quiz->first_place_certificate;

                }
            } else {
                $certificate_type = QuizResult::DEFAULT_TEACHER;
            }
            $quiz_result->certificate_type = $certificate_type;
            $quiz_result->certificate_path = $certificate_path;
            $quiz_result->all_score = $quiz->questions->count();

            $order->status = Order::PASSED;
            $quiz_result->save();
            $order->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new WebServiceExplainedException('Системная ошибка! '. $exception->getMessage());
        }

        $this->makeToast('success', 'Олимпиада сәтті аяқталды!');
        session()->forget('order'.$order->id);
        return redirect()->route('profile.quizzes');
    }

    private function checkQuiz($id, $hidden = false, $with_questions = true)
    {
        if($with_questions) {
            if ($hidden) {
                $quiz = Quiz::where('id', $id)->with('questions.hiddenAnswers')->first();
            } else {
                $quiz = Quiz::where('id', $id)->with('questions.answers')->first();
            }
        }
        else {
            $quiz = Quiz::where('id', $id)->first();

        }
        if (!$quiz) throw new WebServiceExplainedException('Тест не найден!');
        return $quiz;
    }
}
