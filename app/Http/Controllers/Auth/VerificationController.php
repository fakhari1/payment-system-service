<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
//    use VerifiesEmails;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'send');
    }

    public function send()
    {
        // get user
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            return redirect('/');
        }

        $user->sendEmailVerificationNotification();

        // redirect
        return redirect()->back()->with(['success_msg' => 'ایمیل با موفقیت ارسال شد.']);
    }

    public function verify(Request $request)
    {
        if ($request->user()->email !== $request->query('email')) {
            throw new AuthorizationException();
        }

        // check status email
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/');
        }

        // verify
        $request->user()->markEmailAsVerified();

        session()->forget('mustVerifyEmail');

        // redirect
        return redirect('/dashboard')->with(['success_msg' => 'ایمیل شما با موفقیت تایید شد.']);
    }
}
