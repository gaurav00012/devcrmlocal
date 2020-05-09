<div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Edit Task</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-md-6 col-sm-6">
               <label for="email">Task Name:</label>
               <?php echo Form::text('task_name', $taskDetail->task_name ,['class' => 'form-control','placeholder'=>'Enter Task Name','id'=>'task_name','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-6 col-sm-6">
               <label for="email">Task Assignee:</label>
               <?php echo Form::select('resource[]', $assigneeArray, $taskAssingeeArray, array('class' => 'form-control resource-list','multiple'=>'multiple','id'=>'resource','disabled'=>'disabled'));?>
            </div>
            <div class="col-md-6 col-sm-6">
               <label for="email">Task Description:</label>
               <?php echo Form::textarea('task_description', $taskDetail->task_description,['class' => 'form-control','placeholder'=>'Enter Task description','id'=>'task_description','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-6 col-sm-6">
               <label for="email">Task Attachments:</label>
               @if(!empty($taskAttachmentArray))
               <p>
                  @foreach($taskAttachmentArray as $taKey => $taVal)
                  <a href="/developer/download-file/{{$taVal}}"><i class="fa fa-file" aria-hidden="true"></i></a>
                  @endforeach
               </p>
               @else
               <p>No Attachments</p>
               @endif
            </div>
            <div class="col-md-6 col-sm-6">
               <label for="email">Task Status:</label>
               <?php echo Form::select('task_status', $taskStatusArray, null, array('class' => 'form-control task-status','id'=>'task_status'));?>
            </div>
            <br>
            <div class="col-md-12 col-sm-12" style="margin-top: 2em;">
               <label for="email">Comments:</label>
               <?php echo Form::textarea('task_comments', '',['class' => 'form-control','id'=>'task_comments','style'=>'margin-top: 2em;']);?>
            </div>
         </div>
         @if(!$taskComment->isEmpty())
         <div  style="margin-top: 2em;">
            <ul class="list-group">
              @foreach($taskComment as $tKey => $tValue)
               <li class="list-group-item"><?php echo $tValue->task_comments; ?></li>
              @endforeach
              </ul>
         </div>
         @else
          <p>No Comments to show</p>
         @endif
      </div>
      
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" data-taskid="{{$taskDetail->task_id}}" id="save-comment">Save changes</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
<script src="{{asset('js/ckeditor4/ckeditor.js')}}"></script>
<script type= text/javascript>
   $(document).ready(function() {
   
    CKEDITOR.replace('task_comments',{
        //filebrowserUploadUrl : 'abc.php',
    });
    $('.resource-list').select2({
      placeholder: 'Select Assignee'
    });
   
    $('#save-comment').click(function(){
      var editorData= CKEDITOR.instances['task_comments'].getData();
      let taskId = $(this).attr('data-taskid');
      $.ajax({
        url : '/developer/add-comment/'+taskId,
        method : 'POST',
        dataType : 'text',
        data : {
          _token: CSRF_TOKEN,
          comment : editorData,
          },
        success:function(resp)
        {
          $("#edit-task-modal").html(resp);
          $('#edit-task-modal').modal('toggle');
        },
      });
    });
   });
</script>