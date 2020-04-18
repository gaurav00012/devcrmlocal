<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterTask;
use App\MasterProject;
use App\MasterCompany;
use App\User;
use App\MasterDropDowns;
use App\MasterTaskAttachment;

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
        $this->validate($request,[
            'task_name' => 'required',
            'duedate' => 'required',
            'task_description' => 'required',
            'task_status' => 'required',
          ]);
        
          
        // $input = $request->post();
        // $task['task_name'] = 
        // $task['project_id'] =
        // $task['task_status'] =
        // $task['task_description'] = 
        // $task['due_date'] = 
        
    }

    public function saveTaskImage()
    {

    }
}
