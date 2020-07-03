<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterTask;
use App\TaskAssignee;
use App\User;
use App\MasterCompany;
use App\MasterTaskComment;
use App\MasterTaskCommentAttachment;
use App\MasterDropDowns;
use App\MasterTaskAttachments;
use App\TaskTimelog;
use Auth;
use DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $timeLog = new TaskTimelog;
        $onGoingTask = $timeLog->getPauseTask();
        //dd($onGoingTask);
        $tasks = DB::select('SELECT mt.*,mtas.* FROM `master_tasks` mt INNER JOIN mas_task_assignee mtas ON mt.task_id = mtas.`task_id` WHERE mtas.assignee = '.$user->id.' ORDER BY mt.position asc');
        $completeTask = MasterTask::getCompletedTask();
        $taskTimeLog = TaskTimelog::All();
        
        foreach($tasks as $key => $task)
        {
            
            $assignee = User::find($task->assignee);
            $company = MasterCompany::find($task->company_id);
            $task->assigneename = $assignee->name;
            $task->companyname = $company->company_name;

        }
        return view('developer.index.index',['tasks'=>$tasks,'onGoingTask'=>$onGoingTask,'taskTimeLog'=>$taskTimeLog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editTask(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        
         
       try{
            $taskId = $request->post()['taskid'];
            $taskDetail = MasterTask::find($taskId);
            $taskComment = $taskDetail->getTaskComment;
            $taskCommentAttachment = MasterTaskCommentAttachment::find($taskId);
            $assignee = User::where('user_role','=',2)->get();
            $assigneeArray = array();
            foreach($assignee as $aK => $assigneValue)$assigneeArray[$assigneValue->id] = $assigneValue->name;
           
            $taskAssignee = $taskDetail->getAssignee;
            $taskAttachments = $taskDetail->getTaskAttachments;
            $taskAssigneeArray = array();
            foreach($taskAssignee as $tk => $tValue)
            {
                array_push($taskAssigneeArray,$tValue->assignee);
            }
            
            $taskAttachmentArray = array();
            foreach($taskAttachments as $tkKey => $tkValue)
            {
               $taskAttachmentArray[$tkValue->id] = $tkValue->file_name;
            }
       
            $taskStatus = MasterDropDowns::where('type','=','TASK_STATUS')->get();
            $taskStatusArray = array(''=>'Please select Status');
            foreach($taskStatus as $taskKey => $taskstatus)$taskStatusArray[$taskstatus->id] = $taskstatus->name;
            return view('developer.index.edit-task-modal',[
                                    'taskDetail'=>$taskDetail,
                                    'taskComment'=>$taskComment,
                                    'taskCommentAttachment'=>$taskCommentAttachment,
                                    'taskStatusArray'=>$taskStatusArray,
                                    'taskAssingeeArray' => $taskAssigneeArray,
                                    'assigneeArray' => $assigneeArray,
                                    'taskAttachmentArray' => $taskAttachmentArray
                    ]);
       }
       catch(\Exception $e){
        $result['success'] = false;   
        $result['error'] = $e->getMessage();
        return $result;
       }
    }

    public function downloadfile($fileName)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try{
            $pathToFile= public_path()."/files/".$fileName;
            return response()->download($pathToFile);   
        }
        catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
    }

    // public function addComment($id,Request $request)
    // {
    //     $result['success'] = true;
    //     $result['exception_message'] = '';
      
    //     try{
    //         $this->validate($request,[
    //             'comment' => 'required',
    //          ]);
    //         $user = Auth::user();
            
    //         if($request->post()['taskstatus'] != '' || $request->post()['taskstatus'] != null)
    //         {
    //             $getTask = MasterTask::find($id);
    //             $getTask->task_status = $request->post()['taskstatus'];
    //             $getTask->save();
    //         }
            
    //        $taskId = MasterTask::findOrFail($id);
    //        $comment['task_id'] = $id;
    //        $comment['task_comments'] = $request->post()['comment'];
    //        $comment['created_by'] = $user->id;
    //        $comment = MasterTaskComment::create($comment);
    //        $result['comment_id'] = $comment->id;
    //        $result['task_id'] = $id;
    //     //    return json$result;

    //     }
    //     catch(\Exception $e){
    //         $result['success'] = false;   
    //         $result['exception_message'] = $e->getMessage();
    //        // return $result;
    //     }
    //     return response()->json($result);
    // }

     public function addComment(Request $request, $id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {

            $user = Auth::user();
            $taskDetail = TaskAssignee::where('task_id', '=', $id)->where('assignee', '=', $user->id)->get();
            
            if ($request->post()['task_status'] != '' || $request->post() ['task_status'] != null)
            {

                $taskDetail[0]->getTask->task_status = $request->post() ['task_status'];
                $taskDetail[0]->getTask->save();
                $result['task_id'] = $taskDetail[0]->getTask->task_id;
            }
            if ($request->post()['task_comment'] != '' || $request->post()['task_comment'] != null)
            {
                $comment['task_id'] = $id;
                $comment['task_comments'] = $request->post() ['task_comment'];
                $comment['created_by'] = $user->id;
                $comment = MasterTaskComment::create($comment);
                $result['comment_id'] = $comment->id;
                $result['task_id'] = $taskDetail[0]->task_id;

                  if($request->hasFile('attachment'))
                  {
                     $fileDestination = 'files/comment_attachment';
                     $this->fileupload($request->file('attachment'),$fileDestination,$id,$comment->id);
                  }
            }

            
        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
            // return $result;
            
        }
        return response()->json($result);
    }

    public function editComment(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try{
            $commentData = MasterTaskComment::find($request->post()['comment_id']);
            return view('developer.index.edit-comment',['commentData'=>$commentData]);
        } catch(\Exception $e){
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
    }

    public function updatecomment(Request $request,$id)
    {
        $result['success'] = true;

        try{
            $user = Auth::user();
            $post = $request->post();
            $commentData = MasterTaskComment::find($id);
            $commentData->task_comments = $post['comment'];
            $commentData->edit_count = $commentData->edit_count + 1;
            $commentData->updated_by = $user->id;
            
            if($commentData->save())
                $result['comment_id'] = $commentData->id;$result['task_id'] = $commentData->task_id;
            
        } catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
        return response()->json($result);
    }

    public function startTask(Request $request, $id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';

        try{
          $user = Auth::user();
          $post = $request->post();
          $taskId = $post['taskid'];
          $taskStatus = $post['task_status'];

          $timeLog = new TaskTimelog;

          $taskAssignee = TaskAssignee::where('task_id','=',$taskId)
                                      ->where('assignee','=',$user->id)
                                      ->get();

        //  $getPauseTask = $timeLog->getPauseTask();
        //  dd($getPauseTask);
          $saveStartTime = $timeLog->saveStartTime($taskId,$taskStatus); 
       //   $getTaskTimeLog = $timeLog->getTaskTimeLog($id);
          if($saveStartTime)
          {
            $result['success'] = true;
            $result['task_id'] = $id;
          }                       
          
        }
        catch(\Exception $e)
        {
          $result['success'] = false;   
          $result['exception_message'] = $e->getMessage();
          
        }
        return $result;
    }

     public function getTimeLog(Request $request)
     {
         $result['success'] = true;
         $result['exception_message'] = '';
        try{
          $user = Auth::user();
          $post = $request->post();
          //$timeLog = new TaskTimelog;
          $taskTimeLogs = TaskTimelog::getLogs($post['taskid']);
          // foreach($taskTimeLogs as $key => $taskTimeLog)
          // {
          //   echo $taskTimeLog->start_time;
          // }
          return view('developer.index.get-time-log',['taskTimeLogs'=>$taskTimeLogs]);
        }
        catch(\Exception $e){
          $result['success'] = false;   
          $result['exception_message'] = $e->getMessage();
        }
     }

     private function fileupload($file,$fileDestination,$taskId,$commentId)
     {
       $result['success'] = true;
        $result['exception_message'] = array();
       
        $user = Auth::user();
            try{
            $destinationPath = $fileDestination;
            if (!file_exists($destinationPath)) {
               mkdir($destinationPath, 0755, true);
            }
            $extension = $file->getClientOriginalExtension();
            $validextensions = array("jpeg","jpg","png","pdf");
    
            $fileName = 'comment_'.str_slug(Carbon::now()->toDayDateTimeString()).'.' . $extension;
              // Uploading file to given path
             $file->move($destinationPath, $fileName); 
             $commentAttachment['task_id'] = $taskId;
             $commentAttachment['task_comment_id'] = $commentId;
             $commentAttachment['attachment_name'] = $fileName;
             $commentAttachment['created_by'] = $user->id;
             MasterTaskCommentAttachment::create($commentAttachment);
            }
            catch (\Exception $e) {
                $result['success'] = false;
                $result['exception_message'] = $e->getMessage();
            }
          return response()->json($result);
    }
}
