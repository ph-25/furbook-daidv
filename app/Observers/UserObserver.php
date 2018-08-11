<?php

namespace Furbook\Observers;

use Furbook\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \Furbook\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  \Furbook\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}