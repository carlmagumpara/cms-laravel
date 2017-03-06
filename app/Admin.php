<?php

namespace App;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends User
{
    protected $table = "admins";

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function posts() {

        return $this->hasMany(Post::class);

    }

}
