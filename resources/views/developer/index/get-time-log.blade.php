<div class="modal-dialog modal-lg" role="document">
   <div class="modal-content ">
      <div class="modal-header">
         <h5 class="modal-title">Time Logs</h5>
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
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
   @foreach($taskTimeLogs as $logKey => $timeLog)
      <tr>
         <td>{{$logKey+1}}</td>
         <td>{{date('h:i:s',strtotime($timeLog->start_time))}}</td>
         <td>{{date('h:i:s',strtotime($timeLog->end_time))}}</td>
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