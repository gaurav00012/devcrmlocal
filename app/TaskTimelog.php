<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;


class TaskTimelog extends Model
{
     protected $table = 'mas_task_time_log';
      protected $fillable = [
        'task_id', 'user_id','start_time','end_time','total_time','company_id','project_id','created_at','created_by','updated_at','updated_by',
    ];


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

     public function checkTask()
     {
         $user = Auth::user();
         $taskInTimeLog = Self::where('user_id','=',$user->id)
                                    ->where('end_time','=',null)
                                    ->get();

         if(!empty($taskInTimeLog[0]))
            return false; 

         return true;


     }

     public function saveStartTime($taskId,$taskStatus,$getTaskDetail)
     {
          $user = Auth::user();
          if($taskStatus == 'Start')
          {    
               if($this->checkTask() === false)
                    throw new \ErrorException('Please pause current task before start new task');

               
               $companyId = $getTaskDetail->getTaskClient->company_id;
               $taskProjectId = $getTaskDetail->project_id;     
                
          	$user = Auth::user();
          	$startTime = new Self;
          	$startTime->task_id = $taskId;
          	$startTime->user_id = $user->id;
               $startTime->company_id = $companyId;
               $startTime->project_id = $taskProjectId;
          	$startTime->start_time = Carbon::now();
          	$startTime->created_at = Carbon::now();
          	$startTime->created_by = $user->id;
          	$startTime->updated_by = $user->id;
          	if($startTime->save())
          	{
          		return true;
          	}
          	else{
          		return false;
          	}
       }
       elseif($taskStatus == 'Pause')
       {
         $taskInTimeLog = Self::where('task_id','=',$taskId)
                                    ->where('user_id','=',$user->id)
                                    ->where('end_time','=',NULL)
                                    ->get();

          if(!$taskInTimeLog->isEmpty()){
               $taskInTimeLog[0]->end_time = Carbon::now();
               if($taskInTimeLog[0]->save())
               {
                    return true;
               }   

          }
           throw new \ErrorException('some error occured please contact to adminstrator');                          
                                     
                               
       }
     }

     public function getPauseTask()
     {
          $user = Auth::user();
          $pauseTask = Self::where('user_id','=',$user->id)
                           ->where('end_time','=',NULL)
                           ->get();

          return $pauseTask;                   
     }

     public static function getLogs($taskId)
     {
         $user = Auth::user();
         
         return Self::where('task_id','=',$taskId)
                          ->where('user_id','=',$user->id)
                          ->get();
                                                    
     }
}
// just checking