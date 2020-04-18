@extends('layouts.admin.main')
@section('heading')
Add Task
@endsection

@section('content')
<div id="add-task">
{!! Form::open(['url' => ['/admin/add-task',$getProject->id],'method' => 'post']) !!}
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
  <div class="col-md-6 col-sm-6">
    <?php echo Form::text('task_name', '',['class' => 'form-control','placeholder'=>'Enter Task Name']);?>
  </div>

 
</div>
<p></p>
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
    <?php echo Form::select('project', $allProject, $getProject->id, array('class' => 'form-control project-list','disabled'=>'disabled'));?>
  </div>
  <div class="col-md-6 col-sm-6">
    <?php echo Form::select('client', $allCompany, $getCompany->id, array('class' => 'form-control client-list','disabled'=>'disabled'));?>
  </div>
</div>
<p></p>

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
    <?php echo Form::select('resource[]', $resource, null, array('class' => 'form-control resource-list','multiple'=>'multiple'));?>
  </div>
  <div class="col-md-6 col-sm-6">
  <input type="text" class="form-control" name="duedate" id="datepicker" placeholder="select Due Date">
  </div>
</div>
<p></p>
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
<?php echo Form::textarea('task_description', '',['class' => 'form-control','placeholder'=>'Enter Task description']);?>
  </div>
  <div class="col-md-6 col-sm-6">
   <?php echo Form::select('task_status', $taskstatus, null, array('class' => 'form-control task-status'));?>
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
<div class="col-sm-12 col-md-12">
      <div class="form-group">
            <?php echo Form::submit('Submit',['class'=>'btn btn-primary btn-add-task']);?>
        </div>
  </div>
{!! Form::close() !!}
</div>
@endsection
@section('vuejs')
<!--         -->

<script>
Dropzone.autoDiscover = false;
var myDropzone = '';
var addedFile = '';
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
 $(document).ready(function() {
  
    $('.resource-list').select2({
      placeholder: 'Select Assignee'
    });
   
     myDropzone = new Dropzone("#dZUpload", {
        autoProcessQueue: false,
        url: "hn_SimpeFileUploader.ashx",
        addRemoveLinks: true,
        maxFiles: 2,
        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            console.log("Successfully uploaded :" + imgName);
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
        // other options
      });

      myDropzone.on("addedfile", function(file) {
      console.log("file uploades")
      });
      
      $('.btn-add-task').click(function(){           
        myDropzone.processQueue();
      });

      $('#datepicker').datepicker({
        format: 'mm-dd-yyyy',
        startDate: '-3d'
    });
    // $("#dZUpload").dropzone({
    //     url: "hn_SimpeFileUploader.ashx",
    //     addRemoveLinks: true,
    //     success: function (file, response) {
    //         var imgName = response;
    //         file.previewElement.classList.add("dz-success");
    //         console.log("Successfully uploaded :" + imgName);
    //     },
    //     error: function (file, response) {
    //         file.previewElement.classList.add("dz-error");
    //     }
    // });

});



   

</script>
@endsection
