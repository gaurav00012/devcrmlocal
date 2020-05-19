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
      <th hidden>position</th>
      <th>Client Can See</th>
        <th>Task Name</th>
        <th>Assigne</th>
        <th>Due Date</th>
        <!-- <th>Task Progress</th>
        <th>Priority</th> -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($projectTask as $key => $projectask)
      <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
          <td><!-- Default switch -->
<div class="custom-control custom-switch">

  <input type="checkbox" class="custom-control-input radio-btn" id="customSwitches{{$key}}" data-key="{{$projectask->task_id}}" <?php echo $projectask->task_view_to_client === 1 ? 'checked' : ''  ?>>

  <label class="custom-control-label" for="customSwitches{{$key}}"></label>
</div></td>
         <td hidden>{{$projectask->position}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{$projectask->due_date}}</td>
        <!-- <td>{{$projectask->task_progress}}</td>
         <td>{{$projectask->task_progress}}</td> -->
         <td><a href="{!! url('admin/edit-task');!!}/{{ $projectask->task_id }}"  class="btn  green-btn">Edit</a>  <a href="{!! url('admin/delete-client');!!}/{{ $projectask ->id }}"  class="btn  green-btn">Delete</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table>

</div>
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


    $(document).ready(function() {
 $('#task-table tbody').sortable({
   update: function($event, ui)
   {
    $(this).children().each(function(index){
      if($(this).attr('data-position') != index+1){
        $(this).attr('data-position',(index+1)).addClass('updated');
      }
    });
    saveNewPositions();
   }
 });

//  $('.radio-btn').on('change',function(){
//   let isChecked = $(this).is(':checked') ? 1 : 0;
//   let taskId = $(this).attr('data-key');
 
//    $.ajax({
//   url : '/admin/task-show-to-client/'+taskId,
//   method : 'POST',
//   dataType : 'text',
//   data : {
//     _token: CSRF_TOKEN,
//     is_checked : isChecked 
//     },
//   success:function(resp)
//   {
//     console.log(resp);
//   },
//  });

//  });
$('#task-table').on('click','.radio-btn',function(){
  let isChecked = $(this).is(':checked') ? 1 : 0;
  let taskId = $(this).attr('data-key');
 
   $.ajax({
  url : '/admin/task-show-to-client/'+taskId,
  method : 'POST',
  dataType : 'text',
  data : {
    _token: CSRF_TOKEN,
    is_checked : isChecked 
    },
  success:function(resp)
  {
    console.log(resp);
  },
 });



});




});

 function saveNewPositions()
 {
   var positions = [];
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $('.updated').each(function(){
      positions.push([$(this).attr('data-index'),$(this).attr('data-position')]);
      $(this).removeClass('updated');
   });

   $.ajax({
      url : '/admin/save-task-position',
      method : 'POST',
      dataType : 'text',
      data : {
        _token: CSRF_TOKEN, 
        update : 1, 
        positions : positions
      },
      success : function(resp){
        console.log(resp);
      },

   });
 }


</script>
@endsection
