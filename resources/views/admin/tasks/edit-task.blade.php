<?php
//dd($taskDetail);
?>
@extends('layouts.admin.main')
@section('heading')
Edit Task
@endsection

@section('content')
<div class="modal" tabindex="-1" id="edit-task-modal" role="dialog">
 
</div>

<div id="add-task">
{!! Form::open(['url' => ['/admin/edit-task',$getProject->id],'method' => 'post']) !!}
<input type="hidden" name="task_id" id="task_id" value="{{$taskDetail->task_id}}" >
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<?php echo Form::hidden('project_id', $getProject->id,['class' => 'form-control','id'=>'project_id']);?>
  <div class="col-md-6 col-sm-6">
    <?php echo Form::text('task_name', $taskDetail->task_name ,['class' => 'form-control','placeholder'=>'Enter Task Name','id'=>'task_name']);?>
  </div>

 
</div>
<p></p>
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
    <?php echo Form::select('project', $allProject, $getProject->id, array('class' => 'form-control project-list','disabled'=>'disabled','id'=>'project'));?>
  </div>
  <div class="col-md-6 col-sm-6">
    <?php //echo Form::select('client', $allCompany, $getCompany->id, array('class' => 'form-control client-list','disabled'=>'disabled'));?>
  </div>
</div>
<p></p>

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
    <?php echo Form::select('resource[]', $resource, $taskAssigneeArray, array('class' => 'form-control resource-list','multiple'=>'multiple','id'=>'resource'));?>
  </div>
  <div class="col-md-6 col-sm-6">
  <input type="text" class="form-control" name="duedate" id="datepicker" placeholder="select Due Date" value={{$taskDetail->due_date}}>
  </div>
</div>
<p></p>
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" style="display:flex">
<div class="col-md-6 col-sm-6">
<?php echo Form::textarea('task_description', $taskDetail->task_description,['class' => 'form-control','placeholder'=>'Enter Task description','id'=>'task_description']);?>
  </div>
  <div class="col-md-6 col-sm-6">
   <?php echo Form::select('task_status', $taskstatus, $taskDetail->task_status, array('class' => 'form-control task-status','id'=>'task_status'));?>
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
<div class="col-md-12 col-sm-12 col-kg-12">
<button type="button" class="btn btn-primary pull-right add-comment" data-taskid={{$taskDetail->task_id}} id="add-comment"> Add Comment </button>
</div>
@if(!$taskDetail->getTaskComment->isEmpty())
  
         <div  style="margin-top: 2em;">
         <h4>Comments</h4>
            <ul class="list-group">
              @foreach($taskDetail->getTaskComment as $tKey => $tValue)
               <li class="list-group-item">
                  <div class="col-sm-12 col-lg-12">
                  
                      <?php echo $tValue->task_comments; ?>
                       @if(!$tValue->getCommentAttachment->isEmpty())
                              <p>
                                  @foreach($tValue->getCommentAttachment as $attachmentKey => $attachmentValue)
                                   
                                    <!-- <a href="/admin/download-comment-file/{{$attachmentValue->attachment_name}}"><i class="fa fa-file" aria-hidden="true"></i></a> -->
                                    <a href="{{url('/files/comment_attachment/')}}/{{$attachmentValue->attachment_name}}" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a>
                                  @endforeach
                              @endif
                              </p>
                  </div>
                  <div class="col-sm-12 col-lg-12 ">
                     <div class="col-md-6 col-sm-6 pull-left">
                     <h1><span class="badge badge-secondary"><?php echo $tValue->getUserName->name; ?></span>  <span class="badge badge-secondary"><?php echo $tValue->getUserName->created_at; ?></span>
                     @if($tValue->edit_count > 0)
                     <span class="badge badge-secondary">Edited</span>
                     @endif
                     </h1>
                     </div>
                     @if(Auth::user()->id ==  $tValue->created_by)
                     <div class="col-md-6 col-sm-6 pull-right">
                     <button type="button" class="btn btn-primary edit-comment pull-right" data-comment-id="{{$tValue->id}}" id="edit-comment_{{$tValue->task_id}}">Edit</button>
                     </div>
                     @endif
                  </div>
                  </li>
              @endforeach
              </ul>
         </div>
         @else
          <p>No Comments to show</p>
         @endif
         <p></p>
<div class="col-sm-12 col-md-12">
      <div class="form-group">
            <?php echo Form::button('Submit',['class'=>'btn btn-primary btn-add-task','id'=>'edit-task']);?>
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
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
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
        //maxFiles: 10,
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

<?php if(!empty($taskAttachment)){?>
    <?php foreach($taskAttachment as $attachmentId => $attachment){ ?>

        var fileName='<?php echo $attachment->file_name ?>';	
        if(fileName != '')
        {
          myDropzone.on("addedfile", function(file)
        			{
        		    	$(file.previewTemplate).find(".dz-details").wrap("<a href='http://localhost:8000/files/"+fileName+"' data-original-title='Download Document' data-toggle='tooltip'></a>")
        			});
        }
        <?php 
        $url = 'http://localhost/devcrmlocal/public/files/';
      //  $headers = array_change_key_case(get_headers('http://localhost/devcrmlocal/public/files/task_wed-apr-22-2020-530-pm', 1));
        	 //  $fileName=$form->get('file_name')->getValue();
        	
            	//$isImage=@exif_imagetype($bucketurl.'/sales/vendor/'.$fileName);
            	//$docSize=@filesize($bucketurl.'/sales/vendor/'.$fileName);
             //   $isImage=@exif_imagetype('http://localhost:8000/files/'.$attachment->file_name);
      //   $docSize=filesize('http://localhost:8000/files/task_wed-apr-22-2020-530-pm');
         
                $headers = array_change_key_case(get_headers($url.'/'.$attachment->file_name, 1));
                $docSize = isset($headers['content-length'])?trim($headers['content-length'],'"'):0;
               
                
            ?>
         
            var mockFile = { name: '<?php echo $attachment->file_name; ?>',accepted: true,custom:true,size:<?php echo $docSize?$docSize:0;?>};
       //     myDropzone.emit("complete", mockFile);
            myDropzone.emit("addedfile", mockFile);
            myDropzone.emit("thumbnail",mockFile,"http://localhost:8000/files/"+fileName);
            mockFile.previewElement.classList.add('dz-success');
    		mockFile.previewElement.classList.add('dz-complete');
    		myDropzone.options.maxFiles=0;	
    <?php } ?>
<?php } ?>
 
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
      //alert("clicked");
     let params = {};
     let taskId = $('#task_id').val();
     let projectId = $('#project_id').val();
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     let taskName = $('#task_name').val();
     let taskresource = $('#resource').val()
     let taskDueDate = $('#datepicker').val();
     let taskdescription = $('#task_description').val();
     let taskstatus = $('#task_status').val();
     

    // if(fileaddedDropzone == '1')
    //    {
    //     uploadFile(12);
    //     //myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    //    }
    //    return;


     $.ajax({
      url: '/admin/update-task/'+taskId,
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
        let taskId = resp.task_id;
        console.log(taskId);
        alert("Task Updated");
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
      },
      error: function (textStatus, errorThrown) {
           console.log(errorThrown);
        }      

     });
    });

    $('#add-comment').click(function(){
      let taskId = $(this).attr('data-taskid');
     
      $.ajax({
          url : '/admin/add-comment/'+taskId,
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
    });
   
     $('.edit-comment').click(function(){
      alert("edit comment task blade");
      let commentId = $(this).attr('data-comment-id');
        $.ajax({
          url : '/admin/edit-comment/',
          method : 'POST',
          dataType : 'text',
          data : {
            _token: CSRF_TOKEN,
            comment_id : commentId,
            },
          success:function(resp)
          {
             
            $("#edit-task-modal").html(resp);
             $('#edit-task-modal').modal('show');
          },
        });
      });
});


function uploadFile(taskId)
{
    // alert(taskId);
    
}


   

</script>
@endsection

