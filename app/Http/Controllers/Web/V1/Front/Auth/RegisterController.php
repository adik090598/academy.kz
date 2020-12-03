<?php

namespace App\Http\Controllers\Web\V1\Front\Auth;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Auth\RegisterWebForm;
use App\Http\Forms\Web\V1\Auth\UserRegisterWebForm;
use App\Models\Entities\Core\Role;
use App\Models\Entities\Core\User;
use App\Models\Entities\Region;
use App\Models\Entities\Support\AppFile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Rules\YearRule;
use Illuminate\Validation\Rule;

class RegisterController extends WebBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    protected $redirectTo = RouteServiceProvider::WELCOME;


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        $this->added();
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect()->route('welcome');
    }


    public function showRegistrationForm()
    {
        $regions = Region::with('cities.areas.schools')->get();
        return $this->frontPagesView('auth.register', compact('regions'));
    }

    protected function validator(array $data)
    {
        $data['phone'] = preg_replace("/[^0-9]/", "", $data['phone']);
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', '', 'max:11', 'min:11'],
            'surname' => ['required', 'string'],
            'name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'role_id' => ['required', Rule::in([Role::LEARNER_ID, Role::TEACHER_ID])],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $data['phone'] = preg_replace("/[^0-9]/", "", $data['phone']);
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role_id'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'father_name' => $data['father_name'],
            'phone' => $data['phone'],
            'avatar_path' => null
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
