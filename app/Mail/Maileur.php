<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Maileur extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Create a new message instance.
     *
     * @return void
     */
    public $sujet;
    public $texte;
    public $page;
    public $user;

    public function __construct($sujet, $texte, $page , $user)
    {
        $this->sujet = $sujet;
        $this->texte = $texte;
        $this->page = $page;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        /* return $this->from('monsite@chezmoi.com')
            ->view('emails.maileur'); */

        return $this->from('no-reply@h-tsoft.com')
            ->subject($this->sujet)
            ->view('emails.' . $this->page, array(
                'texte' => $this->texte,
                'user' => $this->user,
            ));
             
    }
}
