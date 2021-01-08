<?php
namespace App\Traits;
use Illuminate\Http\Request;
use App\Notifications as notificationData;
use Auth;

trait Notification
{

	public function notification($from,$to,$subject,$message,$status = 0)
	{
        // echo $from;
        // echo '<br>';
        // echo $to;
        // echo '<br>';
        // echo $subject;
        // echo '<br>';
        // echo $message;
        // echo '<br>';
        // echo $status;
        // die();
        // $result['success'] = true;
        // $result['exception_message'] = '';

        // try{
         $notification['from'] = Auth::user()->id;
         $notification['to'] = $to;
         $notification['subject'] = $subject;
         $notification['message'] = $message;
         $notification['created_by'] = Auth::user()->id;
         $notification['updated_by'] = Auth::user()->id;

          if(notificationData::create($notification))
          {
             return true;
          }
	
        // }
        // catch(\Exception $e)
        //     {
        //         $result['success'] = false;
        //         $result['error'] = $e->getMessage();
        //         return $result;
        //     }


	}

    public function updateNotification()
    {
        
    }


}

?>