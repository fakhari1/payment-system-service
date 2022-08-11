<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');

        return view('auth.passwords.reset-password', compact('email', 'token'));
    }

    public function reset(ResetPasswordRequest $request)
    {
        $response = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET ?
            redirect()->route('login.form')->with(['success_msg' => 'گذرواژه شما بروزرسانی شد؛ اکنون میتوانید برای ورود اقدام کنید.']) :
            redirect()->back()->with(['error_msg' => 'خطا هنگام تغییر گذرواژه؛ لطفا دوباره تلاش کنید.']);
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        return $user->save();
    }
}
