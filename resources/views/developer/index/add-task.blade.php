@extends('layouts.admin.main')

@section('notification-count')
 
@endsection

@section('notification-content')
 
@endsection
@section('heading')
Add Task
@endsection
@section('content')

<div id="add-task">
  {!! Form::open(['url' => ['developer/add-task'],'method' => 'post']) !!}

    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<?php //echo Form::hidden('project_id', 1,['class' => 'form-control','id'=>'project_id']);?>

<div class="col-md-6 col-sm-6">
    <?php echo Form::select('project', $projectArray, '', array('class' => 'form-control project-list','id'=>'project'));?>
  </div>
  <div class="col-md-6 col-sm-6">
    <?php echo Form::text('task_name', '',['class' => 'form-control','placeholder'=>'Enter Task Name','id'=>'task_name']);?>
    <div id="err_task_name">
       <span class="err_task_name text-danger error"></span>
    </div>
  </div>
</div>

<p></p>


<p></p>

<p></p>
<div class="col-md-12">
  <div class="col-md-6 col-sm-6">
  <input type="text" class="form-control" name="duedate" id="datepicker" placeholder="select Due Date">
    <div id="err_duedate">
       <span class="err_duedate text-danger error"></span>
    </div>
  </div>
</div>
<p></p>

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
<?php echo Form::textarea('task_description', '',['class' => 'form-control','placeholder'=>'Enter Task description','id'=>'task_description']);?>
    <div id="err_task_description">
       <span class="err_task_description text-danger error"></span>
    </div>
  </div>
  <div class="col-md-6 col-sm-6">
   <?php echo Form::select('task_status', $taskstatus, null, array('class' => 'form-control task-status','id'=>'task_status'));?>
   <div id="err_task_status">
       <span class="err_task_status text-danger error"></span>
    </div>
  </div>
</div>
<p></p>
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-12 col-sm-12">
<div id="dZUpload" class="dropzone">
      <div class="dz-default dz-message">Click Here to Upload File</div>
</div>
</div>
</div>
<p></p>


<p></p>


<p></p>
<div class="col-sm-12 col-md-12">
      <div class="form-group">
            <center><?php echo Form::button('Submit',['class'=>'btn btn-primary btn-add-task','type'=>'submit']);?></center>
        </div>
  </div>
  {!! Form::close() !!}
</div>

@endsection

@section('vuejs')
<script>
  Dropzone.autoDiscover = false;
var myDropzone = '';
let fileaddedDropzone = 0;
// var addedFile = '';
//   var view_table = $("#task-table").DataTable({
//     pagingType: "full_numbers",
//     //columns: columns_operation,
//   });

//   $(".dataTables_length").addClass("bs-select");

//   //To remove unwanted class from pagination drop-down
//   if ($("#task-table_length > label > select")[0])
//     $("#task-table_length > label > select").removeClass(
//       "custom-select-sm form-control form-control-sm"
//     );
 //$('#task-table tbody').sortable();


 myDropzone = new Dropzone("#dZUpload", {
        autoProcessQueue: false,
        url: "/admin/add-task-image",
        headers: {
                    'x-csrf-token': "{{ csrf_token() }}",
                },
        addRemoveLinks: true,
        autoProcessQueue: false,
        maxFiles: 10,
        // success: function (file, response) {
        //     var imgName = response;
        //     file.previewElement.classList.add("dz-success");
        //     console.log("Successfully uploaded :" + imgName);
        // },
        // error: function (file, response) {
        //     file.previewElement.classList.add("dz-error");
        // }
        // other options
      });

      myDropzone.on("addedfile", function(file) {
        fileaddedDropzone = 1;
       // alert(fileaddedDropzone);
      });

  $('#datepicker').daterangepicker({
        singleDatePicker: true,
        format: 'mm-dd-yyyy',
    });
</script>

@endsection