<?php

namespace App\Models;

use App\Mail\Maileur;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Outil extends Model
{

    //Envoi les emails
    public static function sendEmail($destinataire, $sujet, $texte,$user, $page = 'after-register')
    {

        Mail::to($destinataire)
            ->send(new Maileur($sujet, $texte, $page , $user));
        return true;
    }

}
