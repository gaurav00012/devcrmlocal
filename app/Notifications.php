<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;



class Notifications extends Model
{
    //
    protected $table = 'mas_notification';
    protected $fillable = [
        'id', 'from','to','subject','message','status', 'created_at','created_by','updated_at','updated_by'
    ];

    public function userNotification()
    {
    	$this->belongsTo('App\Users','id','to');
    }

    public function getNotificationCount()
    {
    		$user = Auth::user();
    	    $notificationsCount = self::where('to','=',Auth::user()->id)
                                          ->where('status','=',0)
                                          ->get();

           	return count($notificationsCount);                      	

    }

    public function getAllNotification()
    {
    	$user = Auth::user();
    	$getUserNotifications = self::where('to','=',Auth::user()->id)->orderBy('created_at','DESC')->get();	
        return $getUserNotifications;                                  
    }

	public function getTaskTimeLog($id)
	{
		$user = Auth::user();
		$taskInTimeLog = Self::where('task_id','=',$id)
							 ->where('user_id','=',$user->id)
							 ->where('end_time','=',NULL)
							 ->get();
		
	  $taskInTimeLog[0]->end_time = Carbon::now();
	  $taskInTimeLog[0]->save(); 	
	  $hours = $taskInTimeLog[0]->end_time->diffInHours($taskInTimeLog[0]->start_time);
	  //$timeDuration = $taskInTimeLog[0]->start_time->diff($taskInTimeLog[0]->end_time)->format('%H:%I:%S');	 	
	  echo $hours;
	}	 
}
