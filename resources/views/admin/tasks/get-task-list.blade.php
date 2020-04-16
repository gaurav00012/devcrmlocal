@extends('layouts.admin.main')
@section('heading')
Manage Tasks
@endsection

@section('content')
<div id="task-list">
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/add-task',$projectId)!!}"  class="btn btn-primary pull-right" style="margin-right:1em">Add Task</a> 
    <a href="{!! url('admin/manage-client');!!}"  class="btn btn-primary pull-right">Back</a>
</div>
<p></p>
<table class="table table-striped" id="task-table">
    <thead>
      <tr>
        <th>Task Name</th>
        <th>Assigne</th>
        <th>Due Date</th>
        <th>Task Progress</th>
        <th>Priority</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($projectTask as $key => $projectask)
      <tr>
        <td>{{$projectask->task_name}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{$projectask->due_date}}</td>
        <td>{{$projectask->task_progress}}</td>
         <td>{{$projectask->task_progress}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>

</div>
@endsection
@section('vuejs')
<!--         -->

<script>

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
 $('#task-table tbody').sortable();
</script>
@endsection
