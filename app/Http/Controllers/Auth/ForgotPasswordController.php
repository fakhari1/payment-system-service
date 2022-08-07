<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

//    use SendsPasswordResetEmails;

    public function showForm()
    {
        return view('auth.passwords.reset');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ]);

        $response = Password::broker()->sendResetLink($request->only('email'));
        if ($response === Password::RESET_LINK_SENT) {
            return back()->with(['warn_message' => 'لینک بازنشانی گذرواژه به ایمیل شما ارسال شده است.']);
        }

        return back()->with(['error_msg' => 'خطا در ارسال لینک بازنشانی؛ دوباره تلاش کنید.']);
    }
}
