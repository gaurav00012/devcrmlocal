<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterProject;
use App\MasterTask;
use Auth;

class IndexController extends Controller
{
    //
    public function index()
    {
        try{
        $user = Auth::user();
        // echo $user->id;
        $company = $user->companyuser;
        // dd($company->id);
        $tasks = MasterTask::where('company_id',$company->id)
                               ->where('task_view_to_client',1)
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
        return view('client.index',['tasks'=>$tasks]);
        }
        catch(\Exception $e){
            $result['success'] = false;   
            $result['error'] = $e->getMessage();
            return $result;
           }
    }
}
