<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterCompany;
use App\MasterProject;
use App\TaskTimelog;
use App\Traits\Notification;
use Auth;
use Illuminate\Support\Facades\Input;
use DateTime;
use App\User;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Notification;

    public function index($timeLogs = 'group-by-user')
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $user = Auth::user();
            $getCompanyTeam = $user->companyuser->getTeamMember;
    
            $teamMemberId = array();
            foreach($getCompanyTeam as $member)$teamMemberId[] = $member->user_id;

            $allCompanyData = array('' => 'Select Company');
            $allCompany = MasterCompany::All();
            foreach($allCompany as $companyKey => $companyData) $allCompanyData[$companyData->id] = $companyData->company_name;
            
            $usersTimeLogArray = array();
            if(Input::get('time-log-group') != '' && Input::get('time-log-group') == 'group-by-user')
            {
                
               foreach($getCompanyTeam as $id => $teamMember)
               {   
                  $totalOfTime = 0;  
                  $getUserTimelog = TaskTimelog::where('user_id','=',$teamMember->user_id)->get();
                 // echo '<pre>'; print_r($getUserTimelog); echo '</pre>';
            
                  foreach($getUserTimelog as $timeLogKey => $userTimeLog)
                  {
                     $seconds = strtotime($userTimeLog->end_time) - strtotime($userTimeLog->start_time);
                     $days    = floor($seconds / 86400);
                     $hours   = floor(($seconds - ($days * 86400)) / 3600);
                     $totalOfTime += $hours;
                  }
                  $usersTimeLogArray[User::find($teamMember->user_id)->name] = $totalOfTime;
               }
               
            }
          
            echo '<pre>'; print_r($usersTimeLogArray); echo '</pre>';

            if(Input::get('time-log-group') || Input::get('time-log-group') != '')
            {
            
            }

            return view('admin.index',['teamMemberId'=>$teamMemberId,'time_log'=>$timeLogs,'usersTimeLogArray'=>$usersTimeLogArray]);
         }
         catch(\Exception $e)
         {
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
         }
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
