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
use Auth;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
      //  $tasks = TaskAssignee::where('assignee',$user->id)->get()->getTask();
      $tasks = DB::select('SELECT mt.*,mtas.* FROM `master_tasks` mt INNER JOIN mas_task_assignee mtas ON mt.task_id = mtas.`task_id` WHERE mtas.assignee = 4 ORDER BY due_date');
      foreach($tasks as $key => $task)
      {
        
         $assignee = User::find($task->assignee);
         $company = MasterCompany::find($task->company_id);
         $task->assigneename = $assignee->name;
         $task->companyname = $company->company_name;

      }
    //   echo '<pre>';
    //   print_r ($tasks);
      return view('developer.index.index',['tasks'=>$tasks]);
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
            //$taskAssigneeArray = array();
            $taskAssignee = $taskDetail->getAssignee;
            $taskAttachments = $taskDetail->getTaskAttachments;
            $taskAssigneeArray = array();
            foreach($taskAssignee as $tk => $tValue)
            {
                // $taskAssigneeName = User::find($tValue->assignee);
                // $taskAssigneeArray[$tValue->assignee] = $taskAssigneeName->name;
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

    public function addComment($id,Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try{
            $this->validate($request,[
                'comment' => 'required',
             ]);
            $user = Auth::user();
            $taskId = MasterTask::findOrFail($id);
           // $taskComment = MasterTaskComment
           $comment['task_id'] = $id;
           $comment['task_comments'] = $request->post()['comment'];
           $comment['created_by'] = $user->id;
           $comment = MasterTaskComment::create($comment);
           $result['comment_id'] = $comment->id;
           
           return $result;

        }
        catch(\Exception $e){
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
    }
}
