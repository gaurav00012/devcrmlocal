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

    public function getTeamMemberDetails()
    {
        return $this->belongsTo('App\Team','id','user_id');
    }

    public static function updateUser($id,$post)
    {
       //echo '<pre>'; print_r($post); echo '</pre>'; die();
        try{
            $getUserDetail = Self::find($id);
          //  echo '<pre>'; print_r($getUserDetail); echo '</pre>'; die();
            $getUserDetail->name = $post['company_name'];
            $getUserDetail->name = $post['company_email'];

            if($getUserDetail->save())
            {
                return true;
            }
        }
         catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return $result;
        }
    }
   
}
