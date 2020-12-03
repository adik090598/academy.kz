<?php

namespace App\Http\Controllers\web\v1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\UserWebForm;
use App\Http\Requests\Web\V1\UserEditWebRequest;
use App\Models\Entities\Core\User;
use App\Models\Entities\QuizResult;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(){
        $user = Auth::user();
        $user_web_form = UserWebForm::inputGroups($user);
        return $this->frontPagesView('profile.profile', compact('user','user_web_form'));
    }

    public function update(UserEditWebRequest $request){
        $user = Auth::user();

        $old_path = $user->avatar_path;

        $path = null;
        if($request->avatar_path) {
            $path = $this->fileService->updateWithRemoveOrStore($request->avatar_path, User::AVATAR_DIRECTORY, $old_path);
        }
        try {
            $user->update([
                'name'         => $request->name,
                'surname'      => $request->surname,
                'phone'        => $request->phone,
                'avatar_path'  => $path ? $path : $old_path,
                'father_name'  => $request->patronymic,
            ]);
            $this->edited();
            return redirect()->route('profile.profile');
        } catch (\Exception $exception) {
            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }

    }

    public function quizzes(){
        $results = QuizResult::where('user_id', Auth::id())
            ->with('quiz', 'answers.answer.question', 'order')
            ->orderBy('created_at', 'desc')
            ->get();
        return $this->frontPagesView('profile.quizzes', compact('results'));
    }
}