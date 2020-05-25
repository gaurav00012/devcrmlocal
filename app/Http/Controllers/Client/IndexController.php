<?php
namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterProject;
use App\MasterTask;
use App\TaskAssignee;
use App\User;
use App\MasterCompany;
use App\MasterTaskComment;
use App\MasterTaskCommentAttachment;
use App\MasterDropDowns;
use App\MasterTaskAttachments;
use Auth;
use Carbon\Carbon;

class IndexController extends Controller
{
    //
    public function index()
    {
        try
        {
            $user = Auth::user();
            // echo $user->id;
            $company = $user->companyuser;
            // dd($company->id);
            $tasks = MasterTask::where('company_id', $company->id)
                ->where('task_view_to_client', 1)
                ->orderBy('position', 'asc')
                ->get();

            //  $tasks = DB::select('SELECT mt.*,mtas.* FROM `master_tasks` mt INNER JOIN mas_task_assignee mtas ON mt.task_id = mtas.`task_id` WHERE mtas.assignee = '.$user->id.' ORDER BY mt.position asc');
            // foreach($tasks as $key => $task)
            // {
            //     $assignee = User::find($task->assignee);
            //     $company = MasterCompany::find($task->company_id);
            //     $task->assigneename = $assignee->name;
            //     $task->companyname = $company->company_name;
            // }
            //  dd($tasks);
            return view('client.index.index', ['tasks' => $tasks]);
        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return $result;
        }
    }

    public function editTask(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';

        try
        {
            $user = Auth::user();
            $taskId = $request->post() ['taskid'];
            $taskDetail = MasterTask::where('task_id', '=',$taskId)
                                    ->where('company_id','=',$user->companyuser->id)
                                    ->get();
             // foreach($taskDetail[0]->getTaskComment as $key => $value)
             // {
             //    echo $value->getCommentAttachment;
             // }

            
            $taskComment = $taskDetail[0]->getTaskComment;
            //$taskCommentAttachment = MasterTaskCommentAttachment::find($taskId);
            $assignee = User::where('user_role', '=', 2)->get();
            $assigneeArray = array();
            foreach ($assignee as $aK => $assigneValue) $assigneeArray[$assigneValue->id] = $assigneValue->name;

            $taskAssignee = $taskDetail[0]->getAssignee;
            $taskAttachments = $taskDetail[0]->getTaskAttachments;
            $taskAssigneeArray = array();
            foreach ($taskAssignee as $tk => $tValue)
            {
                array_push($taskAssigneeArray, $tValue->assignee);
            }

            $taskAttachmentArray = array();
            foreach ($taskAttachments as $tkKey => $tkValue)
            {
                $taskAttachmentArray[$tkValue->id] = $tkValue->file_name;
            }

            $taskStatus = MasterDropDowns::where('type', '=', 'TASK_STATUS')->get();
            $taskStatusArray = array(
                '' => 'Please select Status'
            );
            foreach ($taskStatus as $taskKey => $taskstatus) $taskStatusArray[$taskstatus->id] = $taskstatus->name;


          //  $taskCommentAttachment = $taskDetail[0]->getTaskComment;
            // foreach($taskComment as $key => $val)
            // {
            //     if(!$val->getCommentAttachment->isEmpty()){
            //         echo '<pre>';
            //        print_r($val->id.''.$val->task_comments.''.$val->getCommentAttachment);
            //           echo '</pre>';
            //    }
                
            // }
            // die();
          //  dd($taskDetail[0]);
            return view('client.index.edit-task-modal', [
                                                        'taskDetail' => $taskDetail[0],
                                                        //'taskCommentAttachment' => $taskCommentAttachment, 
                                                        'taskStatusArray' => $taskStatusArray, 
                                                        'taskAssingeeArray' => $taskAssigneeArray, 
                                                        'assigneeArray' => $assigneeArray, 
                                                        'taskAttachmentArray' => $taskAttachmentArray
                                                        ]);
        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return $result;
        }
    }

    public function addComment(Request $request, $id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            
            $user = Auth::user();
            $taskDetail = MasterTask::where('task_id', '=', $id)->where('company_id', '=', $user->companyuser->id)->get();

           
            if ($request->post()['task_status'] != '' || $request->post() ['task_status'] != null)
            {

                $taskDetail[0]->task_status = $request->post() ['task_status'];
                $taskDetail[0]->save();
                $result['task_id'] = $taskDetail[0]->task_id;
            }
            if ($request->post()['task_comment'] != '' || $request->post()['task_comment'] != null)
            {
                //$taskId = MasterTask::findOrFail($id);
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
        return response()
            ->json($result);
    }

    public function editComment(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $user = Auth::user();
            $commentData = MasterTaskComment::where('id', '=', $request->post() ['comment_id'])
                ->where('created_by', '=', $user->id)
                ->get();
            return view('client.index.edit-comment', ['commentData' => $commentData[0]]);
        }
        catch(\Exception $e)
        {
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
            $commentData = MasterTaskComment::where('id','=',$id)
                                            ->where('created_by', '=', $user->id)
                                            ->get();     
            if(!empty($commentData[0]))
            {                            

            $commentData = $commentData[0];          
            $commentData->task_comments = $post['comment'];
            $commentData->edit_count = $commentData->edit_count + 1;
            $commentData->updated_by = $user->id;
            
            if($commentData->save())
                $result['comment_id'] = $commentData->id;$result['task_id'] = $commentData->task_id;
            }
            else{
                $result['success'] = false;   
                $result['exception_message'] = 'No Data Found';
            }
            
        } catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
        return response()->json($result);
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

    public function downloadfile($fileName)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try{
            $pathToFile= public_path()."/files/comment_attachment/".$fileName;
            return response()->download($pathToFile);   
        }
        catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
    }

}

