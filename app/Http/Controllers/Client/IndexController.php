<?php
namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterProject;
use App\MasterTask;
use App\TaskAssignee;
use App\User;
use App\MasterCompany;
use App\MasterTaskComment;
use App\MasterTaskCommentAttachment;
use App\MasterDropDowns;
use App\MasterTaskAttachments;
use App\Notifications;
use Auth;
use Carbon\Carbon;
use App\MasInvoice;
use App\MasInvoiceItemDetail;
use App\MasInvoiceItemTotal;
use App\ClientTicket;
use App\TicketComment;


class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
        try
        {
            $query = $request->query('project');

            
            $notifications = new Notifications;
            $notificationCount = $notifications->getNotificationCount();
            $allNotification = $notifications->getAllNotification();
            
            $clientProject = array(
                '' => 'All',
            );
            $user = Auth::user();
            
            $company = $user->clientUser;
            $getClientProject = MasterProject::where('client_id','=',$company->id)->get();
            $getCompanyTicket = ClientTicket::where('client_id','=',$company->id)->get();
            //echo '<pre>'; print_r($getCompanyTicket); echo '</pre>';
            $allProjectId = array();
            foreach($getClientProject as $projecjKey => $project)
            {
                $clientProject[$project->id] = $project->project_name;
                $allProjectId[] = $project->id;
            }

           if($query != '')
           {
            $allProjectId = array();
            $allProjectId[] = $query;
           }
           
          // echo '<pre>'; print_r($allProjectId); echo '</pre>';

            $tasks = MasterTask::where('company_id', $company->id)
                                ->where('task_view_to_client', 1)
                                ->whereIn('project_id',$allProjectId)
                                ->orderBy('position', 'asc')
                                ->get();

            $completeTask = MasterTask::where('company_id', $company->id)
                                ->where('task_view_to_client', 1)
                                ->whereIn('project_id',$allProjectId)
                                ->whereIn('task_status',array(3))
                                ->orderBy('position', 'asc')
                                ->get();      

            $clientApprovalTasks = MasterTask::where('company_id', $company->id)
                                ->where('task_view_to_client', 1)
                                ->whereIn('project_id',$allProjectId)
                                ->whereIn('task_status',array(5))
                                ->orderBy('position', 'asc')
                                ->get();

            $appointmentWithClientTasks = MasterTask::where('company_id', $company->id)
                                                    ->where('task_view_to_client', 1)
                                                    ->whereIn('project_id',$allProjectId)
                                                    ->where('task_view_to_client', 1)
                                                    ->where('task_status',array(6))
                                                    ->orderBy('position', 'asc')
                                                    ->get();     
                                                    //dd($appointmentWithClientTasks);               

            $marketingApprovalTasks = MasterTask::where('company_id', $company->id)
                                                    ->where('task_view_to_client', 1)
                                                    ->whereIn('project_id',$allProjectId)
                                                    ->whereIn('task_status',array(7))
                                                    ->orderBy('position', 'asc')
                                                    ->get(); 

            $dueDateApproachingTasks = MasterTask::where('company_id', $company->id)
                                                    ->where('task_view_to_client', 1)
                                                    ->whereIn('project_id',$allProjectId)
                                                    ->whereIn('task_status',array(5,6,7))
                                                    ->orderBy('position', 'asc')
                                                    ->get();                                         

             $masInvoice =  MasInvoice::Where('client_id',$company->id)->get();
             
  
            return view('client.index.index', [
                                                'tasks' => $tasks,
                                                'completeTask'=>$completeTask,
                                                'clientApprovalTasks' => $clientApprovalTasks,
                                                'appointmentWithClientTasks' => $appointmentWithClientTasks,
                                                'marketingApprovalTasks' => $marketingApprovalTasks,
                                                'notificationCount' => $notificationCount,
                                                'allNotification' => $allNotification,
                                                'masInvoice' => $masInvoice,
                                                'getCompanyTicket' => $getCompanyTicket,
                                                'clientProject' => $clientProject,
                                                'dueDateApproachingTasks'=>$dueDateApproachingTasks
                                                ]);
        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return $result;
        }
    }

    public function editTask(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';

        try
        {
            $user = Auth::user();
            $taskId = $request->post() ['taskid'];
            $taskDetail = MasterTask::where('task_id', '=',$taskId)
                                    ->where('company_id','=',$user->clientUser->id)
                                    ->get();
             // foreach($taskDetail[0]->getTaskComment as $key => $value)
             // {
             //    echo $value->getCommentAttachment;
             // }

            
            $taskComment = $taskDetail[0]->getTaskComment;
            //$taskCommentAttachment = MasterTaskCommentAttachment::find($taskId);
            $assignee = User::where('user_role', '=', 2)->get();
            $assigneeArray = array();
            foreach ($assignee as $aK => $assigneValue) $assigneeArray[$assigneValue->id] = $assigneValue->name;

            $taskAssignee = $taskDetail[0]->getAssignee;
            $taskAttachments = $taskDetail[0]->getTaskAttachments;
            $taskAssigneeArray = array();
            foreach ($taskAssignee as $tk => $tValue)
            {
                array_push($taskAssigneeArray, $tValue->assignee);
            }

            $taskAttachmentArray = array();
            foreach ($taskAttachments as $tkKey => $tkValue)
            {
                $taskAttachmentArray[$tkValue->id] = $tkValue->file_name;
            }

            $taskStatus = MasterDropDowns::where('type', '=', 'TASK_STATUS')->get();
            $taskStatusArray = array(
                '' => 'Please select Status'
            );
            foreach ($taskStatus as $taskKey => $taskstatus) $taskStatusArray[$taskstatus->id] = $taskstatus->name;


          //  $taskCommentAttachment = $taskDetail[0]->getTaskComment;
            // foreach($taskComment as $key => $val)
            // {
            //     if(!$val->getCommentAttachment->isEmpty()){
            //         echo '<pre>';
            //        print_r($val->id.''.$val->task_comments.''.$val->getCommentAttachment);
            //           echo '</pre>';
            //    }
                
            // }
            // die();
          //  dd($taskDetail[0]);
            return view('client.index.edit-task-modal', [
                                                        'taskDetail' => $taskDetail[0],
                                                        //'taskCommentAttachment' => $taskCommentAttachment, 
                                                        'taskStatusArray' => $taskStatusArray, 
                                                        'taskAssingeeArray' => $taskAssigneeArray, 
                                                        'assigneeArray' => $assigneeArray, 
                                                        'taskAttachmentArray' => $taskAttachmentArray
                                                        ]);
        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            $result['line'] = $e->getLine();
            return $result;
        }
    }

    public function addComment(Request $request, $id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            
            $user = Auth::user();
            $taskDetail = MasterTask::where('task_id', '=', $id)->where('company_id', '=', $user->companyuser->id)->get();

           
            if ($request->post()['task_status'] != '' || $request->post() ['task_status'] != null)
            {

                $taskDetail[0]->task_status = $request->post() ['task_status'];
                $taskDetail[0]->save();
                $result['task_id'] = $taskDetail[0]->task_id;
            }
            if ($request->post()['task_comment'] != '' || $request->post()['task_comment'] != null)
            {
                //$taskId = MasterTask::findOrFail($id);
                $comment['task_id'] = $id;
                $comment['task_comments'] = $request->post() ['task_comment'];
                $comment['created_by'] = $user->id;
                $comment = MasterTaskComment::create($comment);
                $result['comment_id'] = $comment->id;
                $result['task_id'] = $taskDetail[0]->task_id;

                  if($request->hasFile('attachment'))
                  {
                     $fileDestination = 'files/comment_attachment';
                     $this->fileupload($request->file('attachment'),$fileDestination,$id,$comment->id);
                  }
            }

            
        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
            // return $result;
            
        }
        return response()
            ->json($result);
    }

    public function editComment(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $user = Auth::user();
            $commentData = MasterTaskComment::where('id', '=', $request->post() ['comment_id'])
                ->where('created_by', '=', $user->id)
                ->get();
            return view('client.index.edit-comment', ['commentData' => $commentData[0]]);
        }
        catch(\Exception $e)
        {
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
                                            ->where('created_by', '=', $user->id)
                                            ->get();     
            if(!empty($commentData[0]))
            {                            

            $commentData = $commentData[0];          
            $commentData->task_comments = $post['comment'];
            $commentData->edit_count = $commentData->edit_count + 1;
            $commentData->updated_by = $user->id;
            
            if($commentData->save())
                $result['comment_id'] = $commentData->id;$result['task_id'] = $commentData->task_id;
            }
            else{
                $result['success'] = false;   
                $result['exception_message'] = 'No Data Found';
            }
            
        } catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
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

    public function downloadfile($fileName)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try{
            $pathToFile = public_path()."/files/comment_attachment/".$fileName;
            return response()->download($pathToFile);   
        }
        catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
    }

    public function updateNotification(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';

        try
        {
            $userId = Auth::user()->id;
            $post = $request->post();
            $notificationIds = isset($post['notificationId']) ? $post['notificationId'] : array();


            if(!empty($notificationIds))
            {
                foreach ($notificationIds as $key => $notificationId) 
                {
                    $getAllNotification =   Notifications::find($notificationId);
                
                    $getAllNotification->status = 1;
                    $getAllNotification->save();
                }
            }

            return $result;

           
        }
        catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
    }

    public function viewInvoice($invoiceId)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {   
            // use App\MasInvoice;
            // use App\MasInvoiceItemDetail;
            // use App\MasInvoiceItemTotal;
            $invoiceItemDetail = MasInvoiceItemDetail::where('invoice_id','=',$invoiceId)->get();
            $invoiceItemTotal = MasInvoiceItemTotal::where('invoice_id','=',$invoiceId)->get();

            return view('client.print-invoice',['invoiceItemDetail'=>$invoiceItemDetail,'invoiceItemTotal'=>$invoiceItemTotal]);
        }
        catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
    }

    public function createTicket(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            //  if($request->hasFile('tckt-file'))
            // {
            //      $destinationPath = 'ticket_attachment/';
            //        if (!file_exists($destinationPath))
            //        {
            //            mkdir($destinationPath, 0755, true);
            //         }
            //     $extension = $request->file('tckt-file')->getClientOriginalExtension();
            //     $validextensions = array("jpeg","jpg","png","pdf");
            //     $fileName = 'ticket_'.str_slug(Carbon::now()->toDayDateTimeString()).'.' . $extension;
            //     $request->file('tckt-file')->move($destinationPath, $fileName); 
            //    // $clientTicket['attachment'] = $fileName;
            // } 

            //die();

            $post = $request->post();
        
             $user = Auth::user()->clientUser;
         
            $clientTicket['user_id'] = $user->user_id;
            $clientTicket['client_id'] = $user->id;
            $clientTicket['company_id'] = $user->company_id;
            $clientTicket['subject'] = $post['tckt-subject'];
            $clientTicket['description'] = $post['tckt-descrption'];
            
            if($request->hasFile('tckt-file'))
            {

                 $destinationPath = 'ticket_attachment/';
                   if (!file_exists($destinationPath))
                   {
                       mkdir($destinationPath, 0755, true);
                    }
                $extension = $request->file('tckt-file')->getClientOriginalExtension();
                $validextensions = array("jpeg","jpg","png","pdf");
                $fileName = 'ticket_'.str_slug(Carbon::now()->toDayDateTimeString()).'.' . $extension;
                $request->file('tckt-file')->move($destinationPath, $fileName); 
                $clientTicket['attachment'] = $fileName;
            }    


            if(ClientTicket::create($clientTicket))
            {
                return redirect()->back()->with('message', 'Ticket Added Successfully');
            }
           
        }
        catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
    }

    public function viewTicket($id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $getTicket = ClientTicket::where('id','=',$id)->get();
            $getTicketComment = TicketComment::where('ticket_id','=',$id)->get();
            
            return view('client.index.view-ticket',['getTicket'=>$getTicket,'getTicketComment'=>$getTicketComment]);
        }
        catch(\Exception $e)
        {
            $result['success'] = false;   
            $result['exception_message'] = $e->getMessage();
            return $result;
        }
    }

    public function saveTicketStatus(Request $request,$id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            //echo '<pre>'; print_r($request->post()); echo '</pre>'; die();
            $user = Auth::user();
            //echo $user->clientUser->id; die();

            $post = $request->post();
           
            
            if($post['comment'] != '')
            {
                $ticketComment['ticket_id'] = $id;
                $ticketComment['comment'] = $post['comment'];
                $ticketComment['commented_by'] = 'client';
                $ticketComment['created_by'] = $user->id;
                $ticketComment['updated_by'] = $user->id;
                TicketComment::create($ticketComment);
            }
            return redirect("/$user->slug")->with('success', 'Ticket Updated successfully');
        }
        catch(\Exception $e)
        {
           $result['success'] = false;
           $result['exception_message'] = $e->getMessage();
        }
    }

}

