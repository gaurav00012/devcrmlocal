@extends('layouts.admin.frontend')
@section('heading')
Task List
@endsection

@section('notificationCount')
  {{$notificationCount}}
@endsection

@section('notification')

@foreach($allNotification as $key => $notification)
 <div class="notifications-msg small <?php echo $notification->status == 0 ? 'unread-msg' : '' ?>" notification-id="{{$notification->id}}">
                  <a href="#">
                     <div class="msg-content ">
                        <label>{{$notification->subject}}</label>
                        <p>{{$notification->message}}</p>
                     </div>
                  </a>
               </div>
@endforeach               

@endsection

@section('clientProject')
<form>
{!! Form::select('project', $clientProject, null, ['class' => 'form-control','onchange'=>'this.form.submit()']) !!}
</form>
@endsection

@section('ticketmodal')
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('client/create-ticket')}}" method="post" enctype="multipart/form-data">
         @csrf
          <div class="form-group">
    <label for="exampleInputEmail1">Project</label>
    {!! Form::select('project', $clientProject, null, ['class' => 'form-control']) !!}
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Subject</label>
    <input type="text" class="form-control" name="tckt-subject" id="tckt-subject">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descrption</label>
    <textarea type="text" class="form-control" name="tckt-descrption"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Upload File</label>
    <input type="file" class="form-control" name="tckt-file">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="modal" tabindex="-1" id="edit-task-modal" role="dialog">
 
</div>

 <main class="py-5">

         <section>
            <div class="container">
              @if(session('message'))
              <div class="alert alert-success" role="alert">
                {{session('message')}}
              </div>
              @endif
               <div class="row">
                <div class="col-md-12 mt-4">
                     <div class="bg-white p-4 rounded task-box shadow-sm">
                        <h4 class="mb-3 mt-n2">Upcomint Appointments:</h4>
                       <table class="table table-striped" id="task-table">
    <thead>
      <tr>
      <th hidden>position</th>
      <th>#</th>
        <th>Task Name</th>
        <th>Due Date</th>
        <th>Task Progress</th>
        <!--<th>Priority</th> -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($appointmentWithClientTasks as $key => $projectask)
      <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
    <td hidden>{{$projectask->position}}</td>
          <td>{{$key+1}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectask->due_date)->format('Y-m-d') }}</td>
         <td>{{$projectask->getTaskStatus->name}}</td>
        <!-- <td>{{$projectask->task_progress}}</td> -->
          <td><a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn btn-primary edit-task">Edit</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table>
                       <!--  <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                           <label class="form-check-label" for="defaultCheck4">Account manager check in <a href="#" class="text-decoration-none text-color-1">12/22/20202</a></label>
                        </div> -->
                     </div>
                  </div>
                  <div class="col-md-12 mt-4">
                     <div class="bg-white p-4 rounded task-box shadow-sm">
                        <h4 class="mb-3 mt-n2">Here are your tasks:</h4>
                        
                        <table class="table table-striped" id="task-table">
    <thead>
      <tr>
      <th hidden>position</th>
      <th>#</th>
        <th>Task Name</th>
        <th>Due Date</th>
        <th>Task Progress</th>
        <!--<th>Priority</th> -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($clientApprovalTasks as $key => $projectask)
      <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
    <td hidden>{{$projectask->position}}</td>
          <td>{{$key+1}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectask->due_date)->format('Y-m-d') }}</td>
         <td>{{$projectask->getTaskStatus->name}}</td>
        <!-- <td>{{$projectask->task_progress}}</td> -->
          <td><a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn btn-primary edit-task">Edit</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table>
                       
                     </div>
                  </div>
                  <div class="col-md-12 mt-4">
                     <div class="bg-white p-4 rounded task-box shadow-sm">
                        <h4 class="mb-3 mt-n2">These following due dates are approaching:</h4>
                        <table class="table table-striped" id="task-table">
    <thead>
      <tr>
      <th hidden>position</th>
      <th>#</th>
        <th>Task Name</th>
        <th>Due Date</th>
        <th>Task Progress</th>
        <!--<th>Priority</th> -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($dueDateApproachingTasks as $key => $projectask)
      <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
    <td hidden>{{$projectask->position}}</td>
          <td>{{$key+1}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectask->due_date)->format('Y-m-d') }}</td>
         <td>{{$projectask->getTaskStatus->name}}</td>
        <!-- <td>{{$projectask->task_progress}}</td> -->
          <td><a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn btn-primary edit-task">Edit</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table>
                       <!--  <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                           <label class="form-check-label" for="defaultCheck4">Account manager check in <a href="#" class="text-decoration-none text-color-1">12/22/20202</a></label>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </section>



















          

























         <section class="mt-4">
            <div class="container">
               <div class="projects-overview bg-white p-4 rounded task-box shadow-sm">
                  <h4 class="mb-3 mt-n2">Projects Overview:</h4>
                  <div class="">
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
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div id="task-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                   
                                    <div class="row">
                                       <div class="col-sm-12">
                                         <table class="table table-striped" id="task-table">
    <thead>
      <tr>
      <th hidden>position</th>
      <th>#</th>
        <th>Task Name</th>
        <th>Due Date</th>
        <th>Task Progress</th>
        <!--<th>Priority</th> -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($tasks as $key => $projectask)
      <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
    <td hidden>{{$projectask->position}}</td>
          <td>{{$key+1}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectask->due_date)->format('Y-m-d') }}</td>
         <td>{{$projectask->getTaskStatus->name}}</td>
        <!-- <td>{{$projectask->task_progress}}</td> -->
          <td><a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn btn-primary edit-task">Edit</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table>
                                       </div>
                                    </div>
                                   
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div id="task-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                   
                                    <div class="row">
                                       <div class="col-sm-12">
                                         <table class="table table-striped" id="task-table">
                                          <thead>
                                            <tr>
                                            <th hidden>position</th>
                                            <th>#</th>
                                              <th>Task Name</th>
                                              <th>Due Date</th>
                                              <th>Task Progress</th>
                                              <!--<th>Priority</th> -->
                                              <th>Action</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                             @foreach ($completeTask as $key => $projectask)
                                            <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
                                          <td hidden>{{$projectask->position}}</td>
                                                <td>{{$key+1}}</td>
                                              <td>{{$projectask->task_name}}</td>
                                              <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectask->due_date)->format('Y-m-d') }}</td>
                                               <td>{{$projectask->getTaskStatus->name}}</td>
                                              <!-- <td>{{$projectask->task_progress}}</td> -->
                                                <td><a href="javascript:void(0)" data-taskid="{{$projectask->task_id}}"  class="btn btn-primary edit-task">Edit</a> </td>
                                            </tr>
                                           @endforeach
                                          </tbody>
                                        </table>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                     
                                       

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

<section class="mt-4">
            <div class="container">
               <div class="projects-overview bg-white p-4 rounded task-box shadow-sm">
                  <h4 class="mb-3 mt-n2">Tickets:</h4>
                  <div class="">
                     <div class="modal" tabindex="-1" id="edit-task-modal" role="dialog">
                     </div>
                   <table class="table admin-client-table" id="client-table">
        <thead>
            <tr>
            <th>#</th>
            <th>Subject</th> 
            <th>Created at</th> 
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($getCompanyTicket as $ticketKey => $getCompanyTicket)
                <tr>
                  <td>{{$ticketKey+1}}</td>
                  <td>{{$getCompanyTicket->subject}}</td>
                  <td>{{date('d-M-Y',strtotime($getCompanyTicket->created_at))}}</td>
                  <td><a href="{{'view-ticket'}}/{{$getCompanyTicket->id}}" class="btn btn-info">View</a></td>
                </tr>
          @endforeach  
           
        </tbody>
</table>
                    
               </div>
            </div>
         </section>
         <section class="mt-4">
            <div class="container">
               <div class="projects-overview bg-white p-4 rounded task-box shadow-sm">
                  <h4 class="mb-3 mt-n2">Invoice:</h4>
                  <div class="">
                     <div class="modal" tabindex="-1" id="edit-task-modal" role="dialog">
                     </div>
                   <table class="table admin-client-table" id="client-table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Invoice Number</th> 
            <th>Action</th>
            </tr>
        </thead>
        <tbody>

          @foreach($masInvoice as $key => $invoiceDetail)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$invoiceDetail->invoice_id}}</td>
            <td><a href="#" onclick='window.open("/view-invoice/{{$invoiceDetail->invoice_id}}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=700,left=500,width=800,height=600")'><button class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
  <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
  <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
</svg></button></a><button class="btn btn-primary">PAY</button></i>
</td>
          </tr>

          @endforeach
       
           
        </tbody>
</table>
                    
               </div>
            </div>
         </section>










         <section class="mt-4">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="bg-white p-4 rounded task-box shadow-sm">
                        <h4 class="mb-3 mt-n2">Marketing waiting for approval:</h4>
                        <div class="row">
                         <?php foreach($marketingApprovalTasks as $marketingApprovalTask){ ?>
                           <div class="col-md-6">
                              <div class="approval-box">
                                 <img src="{{url('files/'.$marketingApprovalTask->getTaskAttachments[0]->file_name)}}" class="d-block rounded" />
                                 <div class="mb-0 p-2 border rounded mt-2">{{$marketingApprovalTask->task_name}}</div>
                              </div>
                           </div>
                         <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="bg-white p-4 rounded task-box shadow-sm">
                        <h4 class="mb-3 mt-n2">Live look into your current Dev project:</h4>
                        <div class="iframe-content">
                           <iframe src="http://onelook.deverybody.com"></iframe>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </main>

@endsection

@section('vuejs')
<!--         -->

<script type="text/javascript">
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var view_table = $("#task-table").DataTable({
    pagingType: "full_numbers",
    //columns: columns_operation,
  });

  $(".dataTables_length").addClass("bs-select");

  //To remove unwanted class from pagination drop-down
  if ($("#task-table_length > label > select")[0])
    $("#task-table_length > label > select").removeClass(
      "custom-select-sm form-control form-control-sm"
    );


 $('#task-table').on('click','.edit-task',function(event){
  //return alert("hello world edit task");
  getEditTaskModel($(this).attr('data-taskid'))
 });

 function getEditTaskModel(id)
 {
   let taskId = id;
   console.log($(this).attr('data-taskid'));
   //console.log(taskId);
   
  $.ajax({
  url : '/client/edit-task',
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

 $('.notify-link').click(function(){
  let allUnreadMsg = $('.unread-msg');
  let readNotification = [];
  $('.unread-msg').each(function(){
    // readNotification.push($(this).attr('notification-id'));
    readNotification.push($(this).attr('notification-id'));
    $(this).removeClass('unread-msg');
  }); 
  $.ajax({
        url : 'client/update-notification',
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