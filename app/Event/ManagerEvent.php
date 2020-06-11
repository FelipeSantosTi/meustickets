<?php

namespace App\Event;

class ManagerEvent
{
    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('event.admins'));
    }
}
