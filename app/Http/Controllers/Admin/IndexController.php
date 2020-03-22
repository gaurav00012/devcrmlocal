<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterCompany;
use App\MasterProject;

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
        $allCompanyData = array('' => 'Select Company');
        $allCompany = MasterCompany::All();
        foreach($allCompany as $companyKey => $companyData) $allCompanyData[$companyData->id] = $companyData->company_name;
        return view('admin.index');
    }

    public function getCompany(Request $request)
    {
        $input = $request->post();
        $companyId = $input['companyid'];
        $companyProjects = MasterProject::where('company_id',$companyId)->get();
        $projectData = array('' => 'Select Project');
       
       foreach($companyProjects as $projectKey => $project) $projectData[$project->id] = $project->project_name;

       echo json_encode($projectData);
       //return json_encode($projectData);
        die();
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
}
