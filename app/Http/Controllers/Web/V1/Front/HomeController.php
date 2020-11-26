<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Http\Forms\Web\V1\UserWebForm;
use App\Models\Entities\Quiz;
use App\Models\Entities\Core\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use App\Services\Common\V1\Support\FileService;

class HomeController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index() {
        $quizzes = Quiz::orderBy('created_at', 'desc')->withCount('questions')->with('subject')->get()->take(3);
        return $this->frontPagesView('welcome', compact('quizzes'));
    }

    public function home() {
        return $this->frontPagesView('home');
    }

    public function login() {
        return $this->frontPagesView('login');
    }

    public function register() {
        return $this->frontPagesView('register');
    }

    public function profile(){
        $user = Auth::user();
        $user_web_form = UserWebForm::inputGroups($user);
        return $this->frontPagesView('profile', compact('user','user_web_form'));
    }

    public function update(Request $request){
        $user = User::find($request->id);

        $old_path = $user->avatar_path;

        $path = null;
        if($request->avatar_path) {
            $path = $this->fileService->updateWithRemoveOrStore($request->avatar_path, User::IMAGE_DIRECTORY, $old_path);
        }
        try {
            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'patronymic' => $request->patronymic,
                'avatar_path' => $path ? $path : $old_path,
                'father_name' => $request->patronymic,
            ]);
            $this->edited();
            return redirect()->route('user.profile');
        } catch (\Exception $exception) {
            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }

    }

}
