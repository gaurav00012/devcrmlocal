<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterTask;
use App\MasterProject;
use App\MasterCompany;

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
        $project = MasterProject::find($id);
        $allProject = MasterProject::all();
        $allCompany = MasterCompany::all();
        $company = MasterCompany::find($project->company_id);
                        
       return view('admin/tasks/add-task',[
            'project' => $project,
            'allProject' => $allProject,
            'allCompany' => $allCompany,
            'company' => $company
       ]);
    }
}
