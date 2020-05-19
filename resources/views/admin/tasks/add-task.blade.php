@extends('layouts.admin.main')
@section('heading')
Add Task
@endsection

@section('content')
<div id="add-task">
{!! Form::open(['url' => ['/admin/add-task',$getProject->id],'method' => 'post']) !!}
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<?php echo Form::hidden('project_id', $getProject->id,['class' => 'form-control','id'=>'project_id']);?>
  <div class="col-md-6 col-sm-6">
    <?php echo Form::text('task_name', '',['class' => 'form-control','placeholder'=>'Enter Task Name','id'=>'task_name']);?>
  </div>

 
</div>
<p></p>
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
    <?php echo Form::select('project', $allProject, $getProject->id, array('class' => 'form-control project-list','disabled'=>'disabled','id'=>'project'));?>
  </div>
  <div class="col-md-6 col-sm-6">
    <?php echo Form::select('client', $allCompany, $getCompany->id, array('class' => 'form-control client-list','disabled'=>'disabled'));?>
  </div>
</div>
<p></p>

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
    <?php echo Form::select('resource[]', $resource, null, array('class' => 'form-control resource-list','multiple'=>'multiple','id'=>'resource'));?>
  </div>
  <div class="col-md-6 col-sm-6">
  <input type="text" class="form-control" name="duedate" id="datepicker" placeholder="select Due Date">
  </div>
</div>
<p></p>
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
<?php echo Form::textarea('task_description', '',['class' => 'form-control','placeholder'=>'Enter Task description','id'=>'task_description']);?>
  </div>
  <div class="col-md-6 col-sm-6">
   <?php echo Form::select('task_status', $taskstatus, null, array('class' => 'form-control task-status','id'=>'task_status'));?>
  </div>
</div>
<p></p>
<div class="col-md-12">
<div class="col-md-6">
<?php echo Form::select('task_status',[''=>'Select Ask Suggestion from','1' => 'Client','2'=>'Client and Developer'], null, array('class' => 'form-control task-status','id'=>'task_status'));?>
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
            <?php echo Form::button('Submit',['class'=>'btn btn-primary btn-add-task']);?>
        </div>
  </div>
{!! Form::close() !!}
</div>
@endsection

@section('vuejs')
  <script  src="{{URL::asset('js/admin/tasks/addtask.js')}}"></script>


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

 
 $(document).ready(function() {
  
    $('.resource-list').select2({
      placeholder: 'Select Assignee'
    });
   
      // $('.btn-add-task').click(function(){           
      //   myDropzone.processQueue();
      // });

      $('#datepicker').datepicker({
        format: 'mm-dd-yyyy',
        startDate: '-3d'
    }); 


    $('.btn-add-task').click(function(){
     let params = {};
     let projectId = $('#project_id').val();
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     console.log(CSRF_TOKEN);
     let taskName = $('#task_name').val();
     let taskresource = $('#resource').val()
     let taskDueDate = $('#datepicker').val();
     let taskdescription = $('#task_description').val();
     let taskstatus = $('#task_status').val();
     console.log(params);

    // if(fileaddedDropzone == '1')
    //    {
    //     uploadFile(12);
    //     //myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    //    }
    //    return;


     $.ajax({
      url: '/admin/add-task/'+projectId,
      type : 'post',
      data : {
              _token: CSRF_TOKEN, 
              task_name : taskName,
              duedate : taskDueDate,
              task_description : taskdescription,
              task_status : taskstatus,
              task_resource : taskresource,
             
            },
      dataType : 'JSON',
      success : function(resp){
        let taskId = resp.taskid;
        console.log(taskId);
       if(fileaddedDropzone == '1')
       {
        uploadFile(taskId);
         //alert("hello world");
         myDropzone.on("sending", function(file, xhr, formData) {
          console.log('file'+file);
          console.log(formData);
          
           formData.append("task_id",taskId);
          });
      
          myDropzone.processQueue();
       }
       else{
        window.location.href = '/admin/manage-task/'+resp.project_id;
       }
      },
      error: function (textStatus, errorThrown) {
           console.log(errorThrown);
        }      

     });
    });

});


function uploadFile(taskId)
{
    alert(taskId);
    
}


   

</script>
@endsection

