<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\SubmitQuizWebRequest;
use App\Models\Entities\Answer;
use App\Models\Entities\Question;
use App\Models\Entities\Quiz;
use App\Models\Entities\QuizResultAnswer;
use App\Models\Entities\Subject;
use App\Models\Entities\Order;
use App\Models\Entities\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends WebBaseController
{
    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')->has('questions')->paginate(10);
        $subjects = Subject::all();
        return $this->frontPagesView('quiz.index', compact('quizzes', 'subjects'));
    }

    public function quiz(Request $request)
    {
        $has_permission = false;
        $quiz = $this->checkQuiz($request->id);
        $order = Order::where('quiz_id', $request->id);
        return $this->frontPagesView('quiz.single', compact('quiz'));
    }

    public function pass(Request $request)
    {
        $quiz = $this->checkQuiz($request->id, true);
        //$questions->toJson(JSON_PRETTY_PRINT);
//
        Order::create([
            'status' => 1,
            'quiz_id' => $quiz->id,
            'user_id' => Auth::id(),
//            'price' => $quiz->price,
//                'transaction_id' => 1
        ]);

        foreach ($quiz->questions as $question) {
            $question->answers = $question->hiddenAnswers;
        }

        return $this->frontPagesView('quiz.pass', compact('quiz'));
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
                'school' => $user->father_name,
                'class_letter' => $user->class_letter,
                'class_number' => $user->class_number,
                'class_teacher' => $user->class_teacher,
                'certificate_type' => QuizResult::DEFAULT,
                'result' => 0
            ]);

            foreach ($answers as $answer) {
                $selected_answers[] = [
                    'answer_id' => $answer->id,
                    'quiz_result_id' => $quiz_result->id,
                    'is_right' => $answer->is_right,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                if($answer->is_right) {
                    $result++;
                }
            }
            QuizResultAnswer::insert($selected_answers);
            $quiz_result->result = $result;
            $quiz = QuizResult::find($request->quiz_id);
            $certificate_type = QuizResult::DEFAULT;
            if($result >= $quiz->third_place && $result < $quiz->second_place) {
                $certificate_type = QuizResult::THIRD_PLACE;
            } else if($result >= $quiz->second_place && $result < $quiz->first_place) {
                $certificate_type = QuizResult::SECOND_PLACE;
            }
            else if($result >= $quiz->first_place) {
                $certificate_type = QuizResult::FIRST_PLACE;
            }
            $quiz_result->certificate_type = $certificate_type;
            $quiz_result->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new WebServiceExplainedException('Системная ошибка! '. $exception->getMessage());
        }

        $result = QuizResult::where('id', $quiz_result->id)
            ->with('quiz', 'answers.answer.question', 'order')->first();

        return $this->frontPagesView('quiz.result', compact('result'));
    }

    private function checkQuiz($id, $hidden = false)
    {
        if ($hidden) {
            $quiz = Quiz::where('id', $id)->with('questions.hiddenAnswers')->first();
        } else {
            $quiz = Quiz::where('id', $id)->with('questions.answers')->first();
        }
        if (!$quiz) throw new WebServiceExplainedException('Тест не найден!');
        return $quiz;
    }
}
