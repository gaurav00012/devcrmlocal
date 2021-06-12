<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterProject;
use App\MasterCompany;
use App\Traits\Notification;
use App\User;
use App\Clients;
use Auth;
use App\Traits\Email;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Notification;
    use Email;

    public function index()
    {
        // echo
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
         $input = $request->post();

         $project->description = $input['project_description'];
       
         if($project->save())
         {
             $getClient = Clients::find($project->client_id);
             $from = Auth::user()->id;
             $to = $getClient->user_id;
             $subject = $project->project_name;
             $message = $project->project_name.' updated successfully.';
             $addNotification = $this->notification($from,$to,$subject,$message);

             $body = view('emails.client-edit-project',['getClient'=>$getClient,'project'=>$project]);
             $this->sendMail($getClient->getUser->email,$getClient->getUser->name,$message,$body);

             return redirect("/admin/manage-projects/$project->client_id")->with('success', 'Project updated successfully');       
         }
         
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
       $companyprojects = MasterProject::where('client_id',$companyId)->paginate(10);
       
       return view('admin.projects.manage-company-project',['companyprojects'=>$companyprojects,'companyId'=>$companyId]);
    }

    public function addProject($id)
    {

      $User = Auth::user();     
     // $companyId = $User->companyuser->id;
     // $clients =  $User->companyuser->getClients;
      $client = Clients::find($id);
      $clientData = array();
      $clientData['clientId'] = $client->id;
      $clientData['clientName'] = User::find($client->user_id)->name;

      return view('admin.projects.add-client-project',['clientData'=>$clientData]);
      //return view('admin.projects.add-client-project');

    }

    public function addClientProject(Request $request, $id)
    {
        $this->validate($request,[
            'project_name' => 'required',
            'project_description' => 'required',
            
         ]);
        //notification($from,$to,$subject);
        $input = $request->post();
       
      
         $project['project_name'] = $input['project_name'];
         $project['description'] = $input['project_description'];
         $project['client_id'] = $id;
        
          if(MasterProject::create($project))
          {
             $getClient = Clients::find($id);
             $from = Auth::user()->id;
             $to = $getClient->user_id;
             $subject = $input['project_name'];
             $message = $input['project_name'].' added successfully.';
             $addNotification = $this->notification($from,$getClient->user_id,$subject,$message);

             $body = view('emails.client-new-project',['getClient'=>$getClient,'project'=>$project]);
             $this->sendMail($getClient->getUser->email,$getClient->getUser->name,$message,$body);
             return redirect("/admin/manage-projects/$id")->with('success', 'Project added successfully');
          }

    }

    public function editProject($id)
    {
        $projectdetail = MasterProject::find($id);
       //dd($projectdetail->client_id);
        //echo $projectdetail->client_id;
        $company = Clients::find($projectdetail->client_id);
     //   dd($company);
        $clientData = array();
        $clientData['clientId'] = $company->id;
        $clientData['clientName'] = $company->company_name;
       // dd($company);
        return view('admin.projects.edit-company-project',['projectdetail'=>$projectdetail,'clientData'=>$clientData]);
    }

   
}
