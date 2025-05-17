<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MemberLoginDetailsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $member; // Member data
    public $user;   // User data

    public $randomPassword;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($member, $user, $randomPassword)
    {
        $this->member = $member;
        $this->user = $user;
        $this->randomPassword= $randomPassword;
    }


    public function build()
    {
        return $this->subject('Member Login Details')
                    ->view('mail.member_login_details')
                    ->with([
                        'member' => $this->member,
                        'user' => $this->user,
                        'password' => $this->randomPassword, // Pass the password variable to the view
                    ]);
    }

}
