<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\UserWebForm;
use App\Http\Requests\Web\V1\UserEditWebRequest;
use App\Models\Entities\Core\User;
use App\Models\Entities\Order;
use App\Models\Entities\QuizResult;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Support\Facades\Auth;

class ProfileController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $user = Auth::user();
        $user_web_form = UserWebForm::inputGroups($user);
        return $this->frontPagesView('profile.profile', compact('user', 'user_web_form'));
    }

    public function update(UserEditWebRequest $request)
    {
        $user = Auth::user();

        $old_path = $user->avatar_path;

        $path = null;
        if ($request->avatar_path) {
            $path = $this->fileService->updateWithRemoveOrStore($request->avatar_path, User::AVATAR_DIRECTORY, $old_path);
        }
        try {
            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'phone' => $request->phone,
                'avatar_path' => $path ? $path : $old_path,
                'father_name' => $request->patronymic,
            ]);
            $this->edited();
            return redirect()->route('profile.profile');
        } catch (\Exception $exception) {
            if ($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }
    }

    public function quizzes()
    {
        $orders = Order::with('quiz.subject')->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->doesnthave('quizResult')
            ->get();

        foreach ($orders as $order) {
            switch ($order->status) {
                case Order::PROCESS:
                    $order->status_text = "Күтілуде";
                    break;
                case Order::ACCEPTED:
                    $order->status_text = "Қабылданды";
                    break;
                default:
                    $order->status_text = "Күтілуде";
                    break;
            }
        }
        $results = QuizResult::where('user_id', Auth::id())
            ->with('quiz.questions.answers', 'answers.answer.question', 'order')
            ->orderBy('created_at', 'desc')
            ->get();
        $question_ids = [];
        foreach ($results as $result) {
            foreach ($result->answers as $answer) {
                $question_ids[] = $answer->answer->question_id;
            }
            $result->not_answered_questions = $result->quiz->questions->whereNotIn('id', $question_ids);
        }
        return $this->frontPagesView('profile.quizzes', compact('results','orders'));
    }

    public function certificates()
    {
        $results = QuizResult::where('user_id', Auth::id())
            ->with('quiz', 'answers.answer.question', 'order')
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($results as $result) {
            switch ($result->certificate_type) {
                case QuizResult::FIRST_PLACE:
                    $result->place = "1 орын";
                    break;
                case QuizResult::SECOND_PLACE:
                    $result->place = "2 орын";
                    break;
                case QuizResult::THIRD_PLACE:
                    $result->place = "3 орын";
                    break;

                default:
                    $result->place = "Алғыс хат";
                    break;
            }
        }
        return $this->frontPagesView('profile.certificates', compact('results'));
    }

    public function getCertificate($id)
    {
        $result = QuizResult::where('user_id', Auth::id())->where('id', $id)->first();
        if (!$result) {
            throw new WebServiceExplainedException('Сертификат не найден!');
        }
        $result->is_default = false;
        if(!in_array($result->certificate_type, [QuizResult::FIRST_PLACE,
            QuizResult::SECOND_PLACE,
            QuizResult::THIRD_PLACE]
        )) {
            $result->is_default = true;
        }
        $result->landscape = true;

        $data = getimagesize($result->certificate_path);

        $width = $data[0];
        $height = $data[1];

        if($width < $height) {
            $result->landscape = false;
        }
        if(!$result->landscape) {
            return $this->frontPagesView('certificates.certificate', compact('result'));
        }else {
            return $this->frontPagesView('certificates.certificate_landscape', compact('result'));
        }

    }

}
