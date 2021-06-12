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
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Notification;

    public function index($timeLogs = '')
    {
        DB::enableQueryLog();
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $user = Auth::user();
            $getCompanyTeam = $user->companyuser->getTeamMember;
    
            $teamMemberId = array();
            foreach($getCompanyTeam as $member)$teamMemberId[] = $member->user_id;

            // $allCompanyData = array('' => 'Select Company');
            // $allCompany = MasterCompany::All();
            // foreach($allCompany as $companyKey => $companyData) $allCompanyData[$companyData->id] = $companyData->company_name;
            
            $usersTimeLogArray = array();
            $userTimeLogByWeek = array();
            $teamDataByWeek = '';
        
            if((Input::get('time-log-group') == 'group-by-user'))
            {
                //echo 'i_am_in_user'; echo '<br><br><br><br><br><br>';
               $teamDataByWeek = Input::get('time-log-by-week');
               $currentDate =  \Carbon\Carbon::now()->toDateTimeString();
              
               $timeLogs =  Input::get('time-log-group');
               
               $lastDays = '';

               if(Input::get('time-log-by-week') != '')
               {
                 $getByDays =  Input::get('time-log-by-week');
                
                 if($getByDays == 'get-last-30-days')
                 {
                   $lastDays = \Carbon\Carbon::today()->subDays(31)->toDateTimeString();  
                 }
                 elseif($getByDays == 'get-last-seven-days')
                 {
                     $lastDays = \Carbon\Carbon::today()->subDays(8)->toDateTimeString();  
                 }
                 elseif($getByDays == 'custom-dates')
                 {
                     $getCustomDate = Input::get('duedate');
                     //echo '<pre>'; print_r($getCustomDate); echo '</pre>'; 
                     $explodeCustomDate = explode('-',$getCustomDate);
                    //  echo '<br><br><br><br><br><br><br>';
                    // echo '<pre>'; print_r($explodeCustomDate); echo '</pre>';
                     $dateOne = date('Y-m-d',strtotime($explodeCustomDate[0]));
                     $dateTwo = date('Y-m-d',strtotime($explodeCustomDate[1]));
                    
            
                      $lastDays = $dateOne;
                      $currentDate = "'".$dateTwo."'";

                 }
                 else{
                     $lastDays = '';
                 }
                 $lastDays = "'".$lastDays."'";
               }
             
               foreach($getCompanyTeam as $id => $teamMember)
               {   
                  $totalOfTime = 0;  
                 
                  if($lastDays != ''){
                      //echo $lastDays.'--'.$currentDate;
                      //echo '<br><br><br><br>';
                    $getUserTimelog = TaskTimelog::where('user_id','=',$teamMember->user_id)
                                                 ->whereBetween('updated_at',[$lastDays,$currentDate])
                                                 ->get();
                 //   echo '<pre>'; print_r($getUserTimelog); echo '</pre>';                             
                  } 
                  else{
                    $getUserTimelog = TaskTimelog::where('user_id','=',$teamMember->user_id)->get();
                  } 
                 
            
                  foreach($getUserTimelog as $timeLogKey => $userTimeLog)
                  {
                     $seconds = strtotime($userTimeLog->end_time) - strtotime($userTimeLog->start_time);
                     $days    = floor($seconds / 86400);
                     $hours   = floor(($seconds - ($days * 86400)) / 3600);
                     $totalOfTime += $hours;
                  }
                  $usersTimeLogArray[User::find($teamMember->user_id)->id] = $totalOfTime;
               }
               
            }
          
            if((Input::get('time-log-group') == 'group-by-project'))
            {
                //echo 'hellow_orld';
                $timeLogs =  Input::get('time-log-group');
                $lastDays = '';
                $getClient = $user->getCompanyClient;
                $currentDate =  \Carbon\Carbon::now()->toDateTimeString();

                if(Input::get('time-log-by-week') != '')
               {
                 $getByDays =  Input::get('time-log-by-week');
                
                 if($getByDays == 'get-last-30-days')
                 {
                   $lastDays = \Carbon\Carbon::today()->subDays(31)->toDateTimeString();  
                 }
                 elseif($getByDays == 'get-last-seven-days')
                 {
                     $lastDays = \Carbon\Carbon::today()->subDays(8)->toDateTimeString();  
                 }
                 elseif($getByDays == 'custom-dates')
                 {
                     $getCustomDate = Input::get('duedate');
                     //echo '<pre>'; print_r($getCustomDate); echo '</pre>'; 
                     $explodeCustomDate = explode('-',$getCustomDate);
                    //  echo '<br><br><br><br><br><br><br>';
                    // echo '<pre>'; print_r($explodeCustomDate); echo '</pre>';
                     $dateOne = date('Y-m-d',strtotime($explodeCustomDate[0]));
                     $dateTwo = date('Y-m-d',strtotime($explodeCustomDate[1]));
                    
            
                      $lastDays = $dateOne;
                      $currentDate = $dateTwo;

                 }
                 else{
                     $lastDays = '';
                 }
                 //$lastDays = "'".$lastDays."'";
               }

                $clientProjectArray = array();
                $projectArray = array();
                $projectTimeCalculate = array();
                foreach($getClient as $key => $clientDetail)
                {
                    $getClientProject = $clientDetail->getClientProject;
                    foreach($getClientProject as $key => $projectDetail)$projectArray[] = $projectDetail->id;
                    
                }
                $projectTotalOfTime = 0;
                foreach($projectArray as $projectId)
                {
                    if($lastDays != ''){
                        echo '<br><br><br><br><br><br><br>';
                        echo $lastDays.'--'.$currentDate;
                    //   $getProjectTimelog = TaskTimelog::where('project_id','=',$projectId)
                    //                                ->whereBetween('updated_at',[$lastDays,$currentDate])
                    //                                ->get();
                      $getProjectTimelog = DB::select("SELECT * FROM `mas_task_time_log` WHERE `project_id` = $projectId  AND `updated_at` BETWEEN '".$lastDays."' AND '".$currentDate."'");                             
                    //  echo '<pre>'; print_r($getProjectTimelog); echo '</pre>';                             
                    } 
                    else{
                      //$getUserTimelog = TaskTimelog::where('user_id','=',$teamMember->user_id)->get();
                       $getProjectTimelog = DB::select("SELECT * FROM `mas_task_time_log` WHERE `project_id` = $projectId");                             
                     // $getProjectTimelog = TaskTimelog::where('project_id','=',$projectId)->get(); 
                    } 
                  //  echo '<pre>'; print_r(DB::getQueryLog()); echo '</pre>';
                   // echo '<pre>'; print_r($getProjectTimelog); echo '</pre>';
                    
                    foreach($getProjectTimelog as $timeLogKey => $timeLog)
                    {
                        //echo '<pre>'; print_r($timeLog->project_id.'<---->'.$timeLog->end_time);echo '</pre>';
                        $seconds = strtotime($timeLog->end_time) - strtotime($timeLog->start_time);
                
                        $days    = floor($seconds / 86400);
                        $hours   = floor(($seconds - ($days * 86400)) / 3600);
                        $projectTotalOfTime += $hours;
                    }  
                    $projectTimeCalculate[$projectId] = $projectTotalOfTime;

                }
                $usersTimeLogArray = $projectTimeCalculate;
            }
           
            return view('admin.index',['teamMemberId'=>$teamMemberId,'time_log'=>$timeLogs,'usersTimeLogArray'=>$usersTimeLogArray,'teamDataByWeek'=>$teamDataByWeek]);
         }
         catch(\Exception $e)
         {
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
            $result['line'] = $e->getLine();
         }
         echo '<pre>'; print_r($result); echo '</pre>';
    }

    public function getTeamMemberProjectDetail(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $user = Auth::user();
            $post = $request->post()['teamMemberId'];   
            $getUserTimelog = TaskTimelog::where('user_id','=',$post)->get();
          
            return view('admin.team.team-member-project-detail',['memberId'=>$post,'getUserTimelog'=>$getUserTimelog]);
        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
            $result['line'] = $e->getLine(); 
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
