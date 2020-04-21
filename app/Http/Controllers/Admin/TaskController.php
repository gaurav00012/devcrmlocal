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

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $projectTask = MasterTask::where('project_id','=',$id)->get();
        $projectId = $id;
        return view('admin/tasks/get-task-list',['projectTask'=>$projectTask,'projectId'=>$projectId]);
    }

    public function addTaskInProject($id)
    {
        $getProject = MasterProject::find($id);
        
        $allProject = MasterProject::where('company_id','=',$getProject->company_id)->get();
        $allCompany = MasterCompany::all();
        $getCompany = MasterCompany::find($getProject->company_id);
        $resource = User::where('user_role','=',2)->get();
        $taskstatus = MasterDropDowns::where('type','=','TASK_STATUS')->get();
      
        
      
        $companyArray = array(
            '' => 'Please select Client'
        );
        foreach($allCompany as $companyId => $company)$companyArray[$company->id] = $company->company_name;
        $projectArray = array(
            '' => 'Please select Project'
        );
        foreach($allProject as $projectId => $project)$projectArray[$project->id] = $project->project_name;
      
        $resourceArray = array();
        foreach($resource as $resourceId => $resoucrData)$resourceArray[$resoucrData->id] = $resoucrData->name;

        $taskStatusArray = array(
            '' => 'Please select status'
        );
        foreach($taskstatus as $taskId => $task)$taskStatusArray[$task->id] = $task->name;
   
     
       return view('admin/tasks/add-task',[
            'project' => $project,
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
          $company = MasterCompany::find($project->company_id);
         
          
         $input = $request->post();
         $user = Auth::user();
         
         
         
         $task['task_name'] = $input['task_name'];
         $task['company_id'] = $project->company_id;
         $task['project_id'] = $id;
         $task['task_status'] = $input['task_status'];
         $task['task_description'] = $input['task_description']; 
         $task['due_date'] = date("Y-m-d", strtotime($input['duedate']));
         $task['created_by'] = $user->id;

         $taskSave = MasterTask::create($task);
         if(!empty($input['task_resource']))
         {
            $resourceArray = $input['task_resource'];
            foreach($resourceArray as $key => $resourceVal)
            {
                $resource['task_id'] = $taskSave->id;
                $resource['assignee'] = $resourceVal;
                $resource['created_by'] = $user->id;
                $resourceSave = TaskAssignee::create($resource);    
            }
         }
         $result['taskid'] = $taskSave->id;
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
}
