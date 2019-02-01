<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send($receiverEmail, $receiverName, $login, $password)
    {
        $mailObj = new \stdClass();
        $mailObj->login = $login;
        $mailObj->password = $password;
        $mailObj->sender = "Тестовий сайт (Піцун Олег)";
        $mailObj->receiver = $receiverName;

        Mail::to($receiverEmail)->send(new DemoEmail($mailObj));
    }
}
