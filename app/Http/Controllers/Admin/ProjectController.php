<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterProject;
use App\MasterCompany;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        return view('admin/projects/index');
        
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
        $project = MasterProject::find($id);
         $this->validate($request,[
           // 'project_name' => 'required',
            'project_description' => 'required',
            
         ]);
 $request->post('email');
        
         //$project = $input['project_name'];
         $project->description = $request->post('project_description');
       
         $project->save();

         //return redirect("/admin/manage-projects/$id");
        //dd($project);
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

    public function getCompanyProject($companyId)
    {
       $companyprojects = MasterProject::where('company_id',$companyId)->get();
       
       return view('admin.projects.manage-company-project',['companyprojects'=>$companyprojects,'companyId'=>$companyId]);
    }

    public function addProject($id)
    {
      $company = MasterCompany::find($id);
      $clientData = array();
      $clientData['clientId'] = $company->id;
      $clientData['clientName'] = $company->company_name;
      return view('admin.projects.add-client-project',['clientData'=>$clientData]);
    }

    public function addClientProject(Request $request, $id)
    {
        $this->validate($request,[
            'project_name' => 'required',
            'project_description' => 'required',
            
         ]);

         $input = $request->post();
         $project['project_name'] = $input['project_name'];
         $project['description'] = $input['project_description'];
         $project['company_id'] = $id;
        
         $projectSave = MasterProject::create($project);

         return redirect("/admin/manage-projects/$id");
    }

    public function editProject($id)
    {
        $projectdetail = MasterProject::find($id);
        $company = MasterCompany::find($projectdetail->id);
        $clientData = array();
        $clientData['clientId'] = $company->id;
        $clientData['clientName'] = $company->company_name;
       // dd($company);
        return view('admin.projects.edit-company-project',['projectdetail'=>$projectdetail,'clientData'=>$clientData]);
    }
}
