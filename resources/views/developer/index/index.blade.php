<?php
use App\MasterCompany;
use App\User;
use App\Clients;
use App\MasterProject;
 ?>
@extends('layouts.admin.main')

@section('notification-count')
  {{$notificationCount}}
@endsection

@section('notification-content')
  @foreach($allNotification as $key => $notification)
  <a class="dropdown-item preview-item <?php echo $notification->status == 0 ? 'unread-msg' : '' ?>" notification-id="{{$notification->id}}">
    <div class="preview-thumbnail">
     <!--  <img src="{{asset('images/faces/face1.jpg')}}" alt="image" class="img-sm profile-pic"> --> </div>
    <div class="preview-item-content flex-grow py-2">
      <p class="preview-subject ellipsis font-weight-medium text-dark">{{ $notification->subject }}</p>
      <p class="font-weight-light small-text"> {{ $notification->message }} </p>
    </div>
  </a>
  @endforeach
@endsection
@section('heading')
<a href="{{url('/developer/add-task')}}" class="btn green-btn" style="margin-left: 66em;padding: 9px;">Add Task</a> 
@endsection
@section('content')
  <div class="modal" tabindex="-1" id="edit-task-modal" role="dialog">
 
  </div>

  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Task</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Completed Task</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="col-sm-12">
      <br>
    <table class="table table-striped task-table" id="task-table">
    <thead>
      <tr>
      <th hidden>position</th>
      <th>#</th>
        <th>Task Name</th>
        <th>Company</th>
        <th>Project</th>
        <!-- <th>Assigne</th> -->
        <th>Due Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach($tasks as $key => $projectask)
      <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
          <td>{{$key+1}}</td>
         <td hidden>{{$projectask->position}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{$projectask->companyname}}</td>
        <td>{{MasterProject::find($projectask->project_id)->project_name}}</td>
       <!--  <td>{{$projectask->assigneename}}</td> -->
        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectask->due_date)->format('Y-m-d') }}</td>
       
          <td><a class="btn green-btn loader_{{$projectask->task_id}}" type="button" hidden disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></a>  
          @if(!$onGoingTask->isEmpty()) 
            @foreach($onGoingTask as $onKey => $ongoingTask)
              @if($ongoingTask->task_id ==  $projectask->task_id)
              <a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn green-btn start-task">Pause</a> 
              @else
              <a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn green-btn start-task">Start</a> 
              @endif
            @endforeach
            @else
             <a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn green-btn start-task">Start</a> 
            @endif
            | <button type="button" class="btn green-btn view-log" data-taskid="{{$projectask->task_id}}">Timelog</button>
            | <a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}" class="btn green-btn edit-task">Edit</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
     <div class="col-sm-12">
      <br>
    <table class="table table-striped complete-task-table" id="task-table">
    <thead>
      <tr>
      <th hidden>position</th>
      <th>#</th>
        <th>Task Name</th>
        <th>Company</th>
        <th>Due Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($completeTask as $key => $projectask )
      <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
          <td>{{$key+1}}</td>
         <td hidden>{{$projectask->position}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{Clients::find($projectask->company_id)->client_id}}</td>
       
        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectask->due_date)->format('Y-m-d') }}</td>
       
          <td><a class="btn green-btn loader_{{$projectask->task_id}}" type="button" hidden disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></a>  
             <button type="button" class="btn green-btn view-log" data-taskid="{{$projectask->task_id}}">Timelog</button>
            | <a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}" class="btn green-btn edit-task">Edit</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>

<!-- <table class="table table-striped" id="task-table">
    <thead>
      <tr>
      <th hidden>position</th>
      <th>#</th>
        <th>Task Name</th>
        <th>Company</th>
        <th>Assigne</th>
        <th>Due Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($tasks as $key => $projectask)
      <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
          <td>{{$key+1}}</td>
         <td hidden>{{$projectask->position}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{$projectask->companyname}}</td>
        <td>{{$projectask->assigneename}}</td>
        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectask->due_date)->format('Y-m-d') }}</td>
       
          <td><a class="btn green-btn loader_{{$projectask->task_id}}" type="button" hidden disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></a>  
          @if(!$onGoingTask->isEmpty()) 
            @foreach($onGoingTask as $onKey => $ongoingTask)
              @if($ongoingTask->task_id ==  $projectask->task_id)
              <a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn green-btn start-task">Pause</a> 
              @else
              <a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn green-btn start-task">Start</a> 
              @endif
            @endforeach
            @else
             <a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn green-btn start-task">Start</a> 
            @endif
            | <button type="button" class="btn green-btn view-log" data-taskid="{{$projectask->task_id}}">Timelog</button>
            | <a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}" class="btn green-btn edit-task">Edit</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table> -->

@endsection
@section('vuejs')
<!--         -->

<script type="text/javascript">
//  $(document).ready(function(){
//  $('.testtooltip').tooltip({
//   sanitize: false
// }).tooltip('show')

// });
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var view_table = $(".task-table").DataTable({
    pagingType: "full_numbers",
    //columns: columns_operation,
  });

  $(".dataTables_length").addClass("bs-select");

  //To remove unwanted class from pagination drop-down
  if ($(".task-table_length > label > select")[0])
    $(".task-table_length > label > select").removeClass(
      "custom-select-sm form-control form-control-sm"
    );


 $('.task-table').on('click','.edit-task',function(event){
  // $(this).attr('data-taskid');
  getEditTaskModel($(this).attr('data-taskid'));
 });

$('.complete-task-table').DataTable();

 $('.task-table').on('click','.start-task',function(event){

    let taskId = $(this).attr('data-taskid');
    $('.loader_'+taskId).show();
    $('.loader_'+taskId).removeAttr("hidden");
    let button = $(this);
    button.hide();
    let btnText = button.text();
    let changeBtn = btnText == 'Start' ? 'Pause' : 'Start';
    //console.log(button.text());
      // if(btnText == 'Start')
      // {

      // }

     $.ajax({
        url : '/developer/start-task/'+taskId,
        method : 'POST',
        dataType : 'text',
        data : {
          _token: CSRF_TOKEN,
          taskid : taskId,
          task_status : btnText,
          },
        success:function(resp)
        {
         // console.log(resp);
          let jsonesp = JSON.parse(resp);
          if(jsonesp.success === true)
          {
            $(button).text(changeBtn);  
            $('.loader_'+taskId).attr("hidden", "hidden");
            $(button).show();
          }
          else
          {
            alert(jsonesp.exception_message);
            $('.loader_'+taskId).attr("hidden", "hidden");
            $(button).show();
          }
          
        },
       });   
 });

 $('.task-table').on('click','.view-log',function(event){
    let taskId = $(this).attr('data-taskid');
    $.ajax({
      url : '/developer/get-time-log',
      method : 'POST',
      dataType : 'text',
      data : {
        _token: CSRF_TOKEN,
        taskid : taskId 
        },
      success:function(resp)
      {
        $("#edit-task-modal").html(resp);
        $('#edit-task-modal').modal('show');
        //alert(resp);
        //$("#edit-task-modal").html(resp);
        //$('#edit-task-modal').modal('show');
      },
     });
  });

 function getEditTaskModel(id)
 {
  let taskId = id;
   console.log($(this).attr('data-taskid'));
   //console.log(taskId);
   
  $.ajax({
  url : '/developer/edit-task',
  method : 'POST',
  dataType : 'text',
  data : {
    _token: CSRF_TOKEN,
    taskid : taskId 
    },
  success:function(resp)
  {
    $("#edit-task-modal").html(resp);
    $('#edit-task-modal').modal('show');
  },
 });
 }

 $('.notification-bell').click(function(){
  alert("Hello World");
 });


 $('.notification-bell').click(function(){
  let allUnreadMsg = $('.unread-msg');
  let readNotification = [];
  $('.unread-msg').each(function(){
    // readNotification.push($(this).attr('notification-id'));
    readNotification.push($(this).attr('notification-id'));
    $(this).removeClass('unread-msg');
  }); 
  $.ajax({
        url : '/developer/update-notification',
        method : 'POST',
        dataType : 'text',
        data : {
          _token: CSRF_TOKEN,
          notificationId : readNotification,
          },
        success:function(resp)
        {
            let jsonesp = JSON.parse(resp);
  
        },
      });
  
 // console.log(result);
 });
 

</script>
@endsection
