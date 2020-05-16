<div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Edit Comment</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
      
         <div class="row">
         <div class="col-md-12 col-sm-12">
         <button type="button"  class="btn btn-primary pull-right" id="edit-comment-back" data-comment-taskid="{{$commentData->task_id}}">Back</button>
         </div>
            <div class="col-md-12 col-sm-12">
               <label for="email">Comment:</label>
               <textarea name="comment"> {!! html_entity_decode($commentData->task_comments) !!}  </textarea>
               <?php //echo Form::text('comment', '',['class' => 'form-control','placeholder'=>'Enter Task Name','id'=>'task_name','disabled'=>'disabled']);?>
            </div>
            
           
            
            
            
         </div>
        
      </div>
      
      <div class="modal-footer">
         <button type="button" class="btn btn-primary save-edit-comment" data-comment-id="{{$commentData->id}}" id="save-edit-comment">Save changes</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>
<script src="{{asset('js/ckeditor4/ckeditor.js')}}"></script>
<script type= text/javascript>
   $(document).ready(function() {
   
  let commentCkEditor =  CKEDITOR.replace('comment',{
        filebrowserUploadUrl : 'abc.php',
    });
  
   
    // $('#save-comment').click(function(){
    //   var editorData= CKEDITOR.instances['task_comments'].getData();
    //   let taskId = $(this).attr('data-taskid');
    //   $.ajax({
    //     url : '/developer/add-comment/'+taskId,
    //     method : 'POST',
    //     dataType : 'text',
    //     data : {
    //       _token: CSRF_TOKEN,
    //       comment : editorData,
    //       },
    //     success:function(resp)
    //     {
    //       $("#edit-task-modal").html(resp);
    //       $('#edit-task-modal').modal('toggle');
    //     },
    //   });
    // });

    // $('.edit-comment').click(function(){
    //   let commentId = 3;
      
    //   $.ajax({
    //     url : '/developer/edit-comment/',
    //     method : 'POST',
    //     dataType : 'text',
    //     data : {
    //       _token: CSRF_TOKEN,
    //       comment_id : commentId,
    //       },
    //     success:function(resp)
    //     {
           
    //       $("#edit-task-modal").html(resp);
    //       $('#edit-task-modal').modal('show');
    //     },
    //   });
    // });
    //save-edit-comment
    $('.save-edit-comment').click(function(){
        let commentId = $(this).attr('data-comment-id');
        var editorData= CKEDITOR.instances['comment'].getData();
        
        $.ajax({
        url : '/developer/update-comment/'+commentId,
        method : 'POST',
        dataType : 'text',
        data : {
          _token: CSRF_TOKEN,
          comment : editorData,
          },
        success:function(resp)
        {
            let jsonesp = JSON.parse(resp);
             //alert(jsonesp.task_id);
             getEditTaskModel(jsonesp.task_id);
          //$("#edit-task-modal").html(resp);
         // $('#edit-task-modal').modal('toggle');
        },
      });
    });

    $('#edit-comment-back').click(function(){
        let commentTaskId = $(this).attr('data-comment-taskid');
        getEditTaskModel(commentTaskId);
    })
   });
</script>