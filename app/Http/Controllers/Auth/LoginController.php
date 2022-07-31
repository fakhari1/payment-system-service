<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

//    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectToDashboard = RouteServiceProvider::DASHBOARD;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // check user and password
        // login
        // redirect to dashboard

        if ($this->attemptLogin($request)) {
            $this->sendSuccessResponse();
        };

        return $this->sendLoginFailedResponse();
    }

    protected function attemptLogin($request)
    {
        return Auth::attempt(
            $request->only(
                [
                    'email',
                    'password'
                ]
            ),
            $request->filled('remember_me')
        );
    }

    protected
    function sendSuccessResponse()
    {
        session()->regenerate();
        return redirect()->intended(RouteServiceProvider::DASHBOARD);
    }

    protected
    function sendLoginFailedResponse()
    {
        return redirect()->back()->with(['error_msg' => 'گذرواژه متعلق به این ایمیل نیست؛ دوباره تلاش کنید.']);
    }

    public function logout()
    {
        session()->invalidate();
        Auth::logout();
        return redirect('/');
    }
}
