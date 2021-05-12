<?php 
use App\MasterCompany;
use App\User;
use App\Clients;
use App\MasterProject;
use App\MasterTask;
?>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       <div class="modal-header">
          <h5 class="modal-title">{{User::find($memberId)->name}} Time Logs</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
       </div>
       <div class="modal-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Project</th>
                <th scope="col">Company</th>
                <th scope="col">Date</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Duration</th>
              </tr>
            </thead>
            <tbody>
              @foreach($getUserTimelog as $taskKey => $logDetails)
              <?php //echo '<pre>'; print_r($logDetails); echo '</pre>';?>
              <tr>
                <th scope="row">{{++$taskKey}}</th>
                <td>{{MasterProject::find(MasterTask::find($logDetails->task_id)->project_id)->project_name}}</td>
                <td>{{User::find(Clients::find(MasterProject::find(MasterTask::find($logDetails->task_id)->project_id)->client_id)->user_id)->name}}</td>
                <td>{{date('d-m-Y',strtotime($logDetails->created_at))}}</td>
                <td>{{date('h:m:s',strtotime($logDetails->start_time))}}</td>
                <td>{{date('h:m:s',strtotime($logDetails->end_time))}}</td>
                <?php
                // $seconds = strtotime($timeLog->end_time) - strtotime($timeLog->start_time);
                // $days    = floor($seconds / 86400);
                // $hours   = floor(($seconds - ($days * 86400)) / 3600);
                // $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
                // $seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
                $date_a = new DateTime($logDetails->end_time);
                $date_b = new DateTime($logDetails->start_time);
       
                $interval = date_diff($date_a,$date_b);
       
                ?>
                <td>{{$interval->format('%H:%I:%S')}}</td>
              </tr>
             @endforeach
             
            </tbody>
          </table>
       </div>
       
       
    </div>
 </div>
 
 <script type= text/javascript>
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 </script>