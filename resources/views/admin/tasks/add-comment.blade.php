<div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Add Comment</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col-md-12 col-sm-12" style="margin-top: 2em;">
               <label for="email">Comments:</label>
               <?php echo Form::textarea('task_comments', '',['class' => 'form-control','id'=>'task_comments','style'=>'margin-top: 2em;']);?>
            </div>
             <div class="col-md-12 col-sm-12" style="margin-top: 1em;">
             <label for="attachment">Attachment:</label>
             <?php echo Form::file('image',['class' => 'form-control','id'=>'task_attachment','style'=>'margin-top: 2em;']); //echo Form::file('comment_attachment', '',['class' => 'form-control','id'=>'task_attachment','style'=>'margin-top: 2em;']);?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-taskid="{{$taskDetail->task_id}}" id="save-comment">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
      
      
   </div>
</div>
<script src="{{asset('js/ckeditor4/ckeditor.js')}}"></script>
<script type= text/javascript>
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function() {
   
    CKEDITOR.replace('task_comments',{
        //filebrowserUploadUrl : 'abc.php',
    });
    $('.resource-list').select2({
      placeholder: 'Select Assignee'
    });
   
    // $('#save-comment').click(function(){
    //   var editorData= CKEDITOR.instances['task_comments'].getData();
    //   let taskId = $(this).attr('data-taskid');
    //   let taskStatus = $('#task_status').val();
     
    //   $.ajax({
    //     url : '/developer/add-comment/'+taskId,
    //     method : 'POST',
    //     dataType : 'text',
    //     data : {
    //       _token: CSRF_TOKEN,
    //       comment : editorData,
    //       taskstatus : taskStatus
    //       },
    //     success:function(resp)
    //     {
    //      let jsonesp = JSON.parse(resp);
    //      getEditTaskModel(jsonesp.task_id);
    //       //$("#edit-task-modal").html(resp);
    //       //$('#edit-task-modal').modal('toggle');
    //     },
    //   });
    // });

     $('#save-comment').click(function(){

      var editorData= CKEDITOR.instances['task_comments'].getData();
      let taskId = $(this).attr('data-taskid');
      let taskStatus = $('#task_status').val();
    //  let commentAttachment = $('#task_attachment');
       let commentAttachment = document.getElementById('task_attachment');
       let commentFiles =  commentAttachment.files;
       let formData = new FormData();
      
     formData.append('task_comment',editorData);
      if(commentAttachment.value.length != 0)
      {
          formData.append('attachment', commentFiles[0], commentFiles[0].name)
      }
      
      $.ajax({
        url : '/admin/save-comment/'+taskId,
        method : 'POST',
        dataType : 'text',
         headers: {
                    'X-CSRF-Token': CSRF_TOKEN 
               },
        data : formData,
        contentType: false,
        cache : false,
        processData: false,
        success:function(resp)
        {
         let jsonresp = JSON.parse(resp);
         location.reload();
         //getEditTaskModel(jsonresp.task_id);
          //$("#edit-task-modal").html(resp);
          //$('#edit-task-modal').modal('toggle');
        },
      });
    });

    $('.edit-comment').click(function(){
      let commentId = $(this).attr('data-comment-id');
       alert("add comment task blade");
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
</script>