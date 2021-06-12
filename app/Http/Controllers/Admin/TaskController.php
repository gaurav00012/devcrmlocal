<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterTask;
use App\MasterProject;
use App\MasterCompany;
use App\User;
use App\MasterDropDowns;
use App\MasterTaskAttachments;
use App\TaskAssignee;
use Auth;
use Carbon\Carbon;
use App\Clients;
use DB;
use App\MasterTaskComment;
use App\MasterTaskCommentAttachment;
use App\Team;
use App\Traits\Notification;
use App\Traits\Email;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Notification;

    public function index()
    {
        //
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

    public function getTaskList($id)
    {
        $projectTask = MasterTask::where('project_id','=',$id)->orderBy('position','ASC')->get();
        $projectId = $id;
     
        return view('admin/tasks/get-task-list',['projectTask'=>$projectTask,'projectId'=>$projectId]);
    }

    public function addTaskInProject($id)
    {
        $user = Auth::user();
        //$user->companyuser->id;
      
        $getProject = MasterProject::find($id);
        
        $allProject = MasterProject::where('client_id','=',$getProject->client_id)->get();
        $allCompany = Clients::all();
        $getCompany = Clients::find($getProject->client_id);
        $resource = Team::where('company_id','=',$user->companyuser->id)->get();
        $taskstatus = MasterDropDowns::where('type','=','TASK_STATUS')->get();
            
        //echo '<pre>'; print_r($resource); echo '</pre>';    

        $companyArray = array(
            '' => 'Please select Client'
        );
        foreach($allCompany as $companyId => $company)$companyArray[$company->id] = User::find($company->user_id);
        $projectArray = array(
            '' => 'Please select Project'
        );
        foreach($allProject as $projectId => $project)$projectArray[$project->id] = $project->project_name;
      
        $resourceArray = array();
        foreach($resource as $resourceId => $resoucrData)$resourceArray[$resoucrData->user_id] = User::find($resoucrData->user_id)->name;

        $taskStatusArray = array(
            '' => 'Please select status'
        );
        foreach($taskstatus as $taskId => $task)$taskStatusArray[$task->id] = $task->name;
        

     
       return view('admin/tasks/add-task',[
           // 'project' => $project,
            'allProject' => $projectArray,
            'allCompany' => $companyArray,
            'company' => $company,
            'getProject' => $getProject,
            'getCompany' => $getCompany,
            'resource' => $resourceArray,
            'taskstatus' => $taskStatusArray,
       ]);
    }

    public function saveProjectTask(Request $request,$id)
    {
       
        $result['success'] = true;
        $result['exception_message'] = '';

        $this->validate($request,[
            'task_name' => 'required',
            'duedate' => 'required',
            'task_description' => 'required',
            'task_status' => 'required',
          ]);

          try{

              $project = MasterProject::find($id);
              $company = Clients::find($project->client_id);
            //   dd($project);
            //   echo $project->client_id;
              
            //   die();  
              
             $input = $request->post();
             
             $user = Auth::user();
             
             $task['task_name'] = $input['task_name'];
             $task['company_id'] = $project->client_id;
             $task['project_id'] = $id;
             $task['task_status'] = $input['task_status'];
             $task['task_description'] = $input['task_description']; 
             $task['due_date'] = date("Y-m-d", strtotime($input['duedate']));
             $task['task_view_to_client'] = 1;
             $task['created_by'] = $user->id;
             
             // $getProject = MasterProject::find($id);
             // $getClient = MasterCompany::find($getProject->company_id);
             $subject = $input['task_name'];
             $message = $input['task_name'].' task added to '.$project->project_name;
             $from = $user->id;
             //foreach($input['task_resource'] as $key => $resource)$addNotification = $this->notification($from,$resource,$subject,$message);
             
          $addClientNotification = $this->notification($user->id,$company->user_id,$subject,$message);
             $taskSave = MasterTask::create($task);
            // Session::flash('success', 'Task Created Successfully');
             $request->session()->flash('success', 'Task Created Successfully');
             if(!empty($input['task_resource']))
             {
                $resourceArray = $input['task_resource'];
                $resource = array();
                foreach($resourceArray as $key => $resourceVal)
                {
                    $resource['task_id'] = $taskSave->task_id;
                    $resource['assignee'] = $resourceVal;
                    $resource['created_by'] = $user->id;
                    $resourceSave = TaskAssignee::create($resource); 
                    $subject = $input['task_name'];
                    $message = 'New task assigne to you in '.$project->project_name;
                    $addResourceNotification = $this->notification($user->id,$resourceVal,$subject,$message);
                }
             }

             $result['taskid'] = $taskSave->task_id;
             $result['project_id'] = $taskSave['project_id'];
        }
        catch(\Exception $e){
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
        }

        return response()->json($result);
        
    }

    public function saveTaskImage(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = array();
       
        $user = Auth::user();
        if($request->hasFile('file')) {
            try{
            $taskId = $request->post('task_id');

            // Upload path
            $destinationPath = 'files/';
            // Create directory if not exists
            if (!file_exists($destinationPath)) {
               mkdir($destinationPath, 0755, true);
            }
     
            // Get file extension
            $extension = $request->file('file')->getClientOriginalExtension();
     
            // Valid extensions
            $validextensions = array("jpeg","jpg","png","pdf");
     
            // Check extension
            //if(in_array(strtolower($extension), $validextensions)){
     
              // Rename file 
            //  $fileName = str_slug(Carbon::now()->toDayDateTimeString()).rand(11111, 99999) .'.' . $extension;
            $fileName = 'task_'.str_slug(Carbon::now()->toDayDateTimeString()).'.' . $extension;
     
              // Uploading file to given path
            $request->file('file')->move($destinationPath, $fileName); 
              
              $taskAttachment['task_id'] = $taskId;
              $taskAttachment['file_name'] = $fileName;
              $taskAttachment['file_type'] = $extension;
              $taskAttachment['created_by'] = $user->id;
              $taskAttachmentSave = MasterTaskAttachments::create($taskAttachment);  
              $result['success'] = true;
            }
            catch (\Exception $e) {
                $result['success'] = false;
                $result['exception_message'] = $e->getMessage();
            }
           
            
          }
          return response()->json($result);
    }

    public function saveTaskPosition(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = array();
       
        $user = Auth::user();
        try{
            $taskpositions = $request->post()['positions'];
            foreach($taskpositions as $key => $position)
            {
                $index = $position[0];
                $newPosition = $position[1];

                $task = MasterTask::find($index);
               
                $task->position = $newPosition;
                $task->save();
              
             
            }
            $result['success'] = true;
        }
        catch(\Exception $e){
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
        }
        return response()->json($result);
    }

    public function editProjectTask($id)
    {
        //try{   
                $user = Auth::user();
                $taskDetail = MasterTask::find($id);
                $taskAssignee = TaskAssignee::where('task_id','=',$id)->get();
                $taskAttachment = MasterTaskAttachments::where('task_id','=',$id)->get();
                
                $getProject = MasterProject::find($taskDetail->project_id);
                    
                $allProject = MasterProject::where('client_id','=',$taskDetail->company_id)->get();
                // echo '<pre>';
                // print_r($taskDetail->due_date);
                // echo '</pre>';
               //  dd($getProject);
                $allCompany = MasterCompany::all();
                $getCompany = MasterCompany::find($getProject->company_id);
               // $resource = User::where('user_role','=',2)->get();

                $resource = Team::where('company_id','=',$user->companyuser->id)->get();

                $taskstatus = MasterDropDowns::where('type','=','TASK_STATUS')->get();
                $taskComment = $taskDetail->getTaskComment;
            
                $companyArray = array(
                    '' => 'Please select Client'
                );
                foreach($allCompany as $companyId => $company)$companyArray[$company->id] = $company->company_name;
                $projectArray = array(
                    '' => 'Please select Project'
                );
                foreach($allProject as $projectId => $project)$projectArray[$project->id] = $project->project_name;
            
                $resourceArray = array();
                foreach($resource as $resourceId => $resoucrData)$resourceArray[$resoucrData->id] = User::find($resoucrData->user_id)->name;
                // echo '<pre>'; print_r($resourceArray); echo '</pre>';
                $taskStatusArray = array(
                    '' => 'Please select status'
                );
                foreach($taskstatus as $taskId => $task)$taskStatusArray[$task->id] = $task->name;

                $taskAssigneeArray = array();
                foreach($taskAssignee as $assigneeKey => $assignee)
                {
                    array_push($taskAssigneeArray,$assignee->assignee);
                }
            return view('admin/tasks/edit-task',[
                    //'project' => $project,
                    'allProject' => $projectArray,
                    'allCompany' => $companyArray,
                    'company' => $company,
                    'getProject' => $getProject,
                    'getCompany' => $getCompany,
                    'resource' => $resourceArray,
                    'taskstatus' => $taskStatusArray,
                    'taskDetail' => $taskDetail,
                // 'taskAssignee' => $taskTeam,
                    'taskAssigneeArray' => $taskAssigneeArray,
                    'taskAttachment' => $taskAttachment
            ]);
        // }
        // catch(\Exception $e){
        //     return $e->getMessage();
        // }
    }

    public function showTaskToClient(Request $request,$id)
    {
        $post = $request->post();
        $taskDetail = MasterTask::find($id);
        $taskDetail->task_view_to_client =  $request->post()['is_checked'];
        $taskDetail->save();
        //dd($taskDetail);
        // echo '<pre>';
        // print_r ($post);
        // echo '</pre>';
    }

    public function updateTask(Request $request,$id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try{
        
            // $this->validate($request,[
            //     'task_name' => 'required',
            //     'duedate' => 'required',
            //     'task_description' => 'required',
            //     'task_status' => 'required',
            //   ]);
            $input = $request->post();
             $user = Auth::user();
             
             $task = MasterTask::find($id);
             $taskAssignee = $task->getAssignee;
             if (!$taskAssignee->isEmpty())
             {
                DB::table('mas_task_assignee')->where('task_id', $id)->delete();
             }

             if(!empty($input['task_resource']))
             {
                $resourceArray = $input['task_resource'];
                foreach($resourceArray as $key => $resourceVal)
                {
                    $resource['task_id'] = $id;
                    $resource['assignee'] = $resourceVal;
                    $resource['created_by'] = $user->id;
                    $resourceSave = TaskAssignee::create($resource);    
                }
             }
            

             $task->task_name = $input['task_name'];
             $task->task_status = $input['task_status'];
             $task->task_description = $input['task_description']; 
             $task->due_date = date("Y-m-d", strtotime($input['duedate']));
             $task->updated_by = $user->id;
             $task->save();
             $result['task_id'] = $task->task_id;
        } catch(\Exception $e){
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
        }
        return response()->json($result);
    }

    public function addComment(Request $request,$id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try{
           $user = Auth::user();
           $task = MasterTask::where('task_id','=',$id)
                             ->where('created_by','=',$user->id)
                             ->get();
           return view('admin.tasks.add-comment',['taskDetail'=>$task[0]]);
        } catch(\Exception $e){
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
        }
    }

    public function saveComment(Request $request,$id)
    {     
        //echo '<pre>'; print_r($request->file('attachment')); echo '</pre>'; die();
        $result['success'] = true;
        $result['exception_message'] = '';
        try{
             $this->validate($request,[
                          'task_comment' => 'required',
                 ]);
            $user = Auth::user();
            //$taskDetail = TaskAssignee::where('task_id', '=', $id)->where('created_by', '=', $user->id)->get();
            //echo '<pre>'; print_r($taskDetail); echo '</pre>'; die();
            $post = $request->post();
            $file = $request->file();
            $comment['task_id'] = $id;
            $comment['task_comments'] = $post['task_comment'];
            $comment['created_by'] = $user->id;
            $comment = MasterTaskComment::create($comment);
           $result['comment_id'] = $comment->id;
           // $result['task_id'] = $taskDetail[0]->task_id;    
              if($request->hasFile('attachment'))
                  {
                   // echo 'thi isdsdsd';
                     $fileDestination = 'files/comment_attachment';
                     $this->fileupload($request->file('attachment'),$fileDestination,$id,$comment->id);
                  }
        } catch(\Exception $e){
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
            $result['line'] = $e->line;
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

     public function downloadCommentfile($fileName)
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

      public function editComment(Request $request)
      {
        $result['success'] = true;
        $result['exception_message'] = '';
        try{
            $user = Auth::user();
            $commentData = MasterTaskComment::where('id','=',$request->post()['comment_id'])
                                            ->where('created_by','=',$user->id)
                                            ->get();

             echo '<pre>'; print_r($commentData); echo '</pre>'; die();                               
            //$commentData->isEmpty();     
            //$commentData = $commentData->isEmpty() ? $commentData : $commentData[0]; 
            return view('admin.tasks.edit-comment',['commentData'=> $commentData]);
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
            $commentData = MasterTaskComment::where('id','=',$id)
                                            ->where('created_by','=',$user->id)
                                            ->get();
                
            $commentData[0]->task_comments = $post['comment'];
            $commentData[0]->edit_count = $commentData[0]->edit_count + 1;
            $commentData[0]->updated_by = $user->id;
            
            if($commentData[0]->save())
                $result['comment_id'] = $commentData[0]->id;$result['task_id'] = $commentData[0]->task_id;
            
        } catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
        return response()->json($result);
    }



}
