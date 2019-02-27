<?php

namespace App\Http\Controllers;

use App\User;
use App\Notifications\EmailSent;

class NotificationController extends Controller
{
    public function __invoke(User $user)
    {
        $user->notify(new EmailSent(request('message')));
    }
}
