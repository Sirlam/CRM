<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'oc_agent_profiles';

     public $primaryKey = 'id';

    protected $fillable = [
        'name', 'first_name', 'last_name', 'mobile', 'email', 'email_verified_at', 'password', 'password_question',
        'password_answer', 'token', 'token_sent', 'token_expire', 'is_approved', 'is_locked', 'created_by',
        'last_login_date', 'last_password_changed', 'role_id', 'location_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
