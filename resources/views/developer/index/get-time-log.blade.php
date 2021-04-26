<div class="modal-dialog modal-lg" role="document">
   <div class="modal-content ">
      <div class="modal-header">
         <h5 class="modal-title"><b>{{Auth::user()->name}}</b> Logs</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
      
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Duration</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
   @foreach($taskTimeLogs as $logKey => $timeLog)
      <tr>
         <td>{{$logKey+1}}</td>
         <td>{{date('H:i:s',strtotime($timeLog->start_time))}}</td>
         <td>{{date('H:i:s',strtotime($timeLog->start_time))}}</td>
         <?php
         // $seconds = strtotime($timeLog->end_time) - strtotime($timeLog->start_time);
         // $days    = floor($seconds / 86400);
         // $hours   = floor(($seconds - ($days * 86400)) / 3600);
         // $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
         // $seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
         $date_a = new DateTime($timeLog->end_time);
         $date_b = new DateTime($timeLog->start_time);

         $interval = date_diff($date_a,$date_b);

         ?>
         <td>{{$interval->format('%h:%i:%s')}}</td>
         <td>{{date('d-m-Y',strtotime($timeLog->start_time))}}</td>
      </tr>

   @endforeach
  </tbody>
</table>

        
      </div>
      
      <div class="modal-footer">
       
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>