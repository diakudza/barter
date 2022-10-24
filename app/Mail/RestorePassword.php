<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestorePassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $password;
    protected $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $email)
    {
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.restorePassword')
            ->with([
                'password' => $this->password,
                'email' => $this->email
            ])
            ->subject('Восстановление пароля.');
    }
}
