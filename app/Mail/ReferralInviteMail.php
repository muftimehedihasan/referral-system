<?php

namespace App\Mail;

use App\Models\Referral;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferralInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $referral;

    public function __construct(Referral $referral)
    {
        $this->referral = $referral;
    }

    public function build()
    {
        return $this->view('emails.referral_invite')->with([
            'referral' => $this->referral,
        ]);
    }
}
