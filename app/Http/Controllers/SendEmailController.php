<?php

namespace App\Http\Controllers;

use App\User;
use App\Notifications\EmailSent;

class SendEmailController extends Controller
{
    public function __invoke(User $user)
    {
        $user->notify(new EmailSent(request('message')));
    }
}
