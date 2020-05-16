@extends('layouts.admin.main')

@section('content')

<!-- Modal -->
  <div class="modal" tabindex="-1" id="edit-task-modal" role="dialog">
 
  </div>

<table class="table table-striped" id="task-table">
    <thead>
      <tr>
      <th hidden>position</th>
      <th>#</th>
        <th>Task Name</th>
        <th>Company</th>
        <th>Assigne</th>
        <th>Due Date</th>
        <!-- <th>Task Progress</th>
        <th>Priority</th> -->
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
        <!-- <td>{{$projectask->task_progress}}</td>
         <td>{{$projectask->task_progress}}</td> -->
          <td><a href="javascript:void(0)" data-taskid={{$projectask->task_id}}  class="btn green-btn edit-task">Edit</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table>

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
  // $(this).attr('data-taskid');
  getEditTaskModel($(this).attr('data-taskid'))
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
 

</script>
@endsection
