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
    protected $fillable = [
        'name', 'email', 'password','user_role','text_password','profile_picture','c_id','slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function companyuser()
    {
        return $this->hasOne('App\MasterCompany','user_id','id');
    }

    public function clientUser()
    {
        return $this->hasOne('App\Clients','user_id','id');
    }

    public function userclient()
    {
        return $this->hasOne('App\ClientForm','id','c_id');
    }

   
}
