<?php

namespace App\Mail;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->markdown('mails.verification-email')->with([
            'link' => $this->urlGenerator(),
            'name' => $this->user->name
        ]);
    }

    protected function urlGenerator()
    {
        return URL::temporarySignedRoute('email-verification.verify', Carbon::now()->addHours(2), ['email' => $this->user->email]);
    }
}
