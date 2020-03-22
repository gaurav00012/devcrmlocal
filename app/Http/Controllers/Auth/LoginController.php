<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   public function redirectTo(){
        
    // User role
    $role = Auth::user()->user_role;
   
    
    if($role === 1){ 
        return 'admin/home';
    }
    elseif($role === 2) {
        return 'developer/home';
    }
    elseif($role === 3) {
        return 'client/home';
    }


    // Check user role
    // switch ($role) {
    //     case 1:
    //             return '/home';
    //         break;
    //     case 'Employee':
    //             return '/projects';
    //         break; 
    //     default:
    //             return '/login'; 
    //         break;
    // }
}

}
