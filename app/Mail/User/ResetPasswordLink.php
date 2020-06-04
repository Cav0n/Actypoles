<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordLink extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $id, string $token)
    {
        $this->subject('Réinitialisation de votre mot de passe');
        $this->id = $id;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS', 'test@test.fr'),)->view('mails.user.reset-password-link');
    }
}
