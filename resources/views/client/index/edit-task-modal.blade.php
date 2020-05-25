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
               <?php echo Form::select('task_status', $taskStatusArray, $taskDetail->task_status, array('class' => 'form-control task-status','id'=>'task_status'));?>
            </div>
            <br>

           
         </div>
         {!! Form::open(['files' => true,'method' => 'post','id'=>'comment-form']) !!}
         <div class="row" style="margin-top: 2em;">
           <?php echo Form::hidden('task_id', $taskDetail->task_id,['class' => 'form-control','id'=>'task_id']);?>
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
     </form>
         @if(!$taskDetail->getTaskComment->isEmpty())
         <div class="col-md-12 col-sm-12"   style="margin-top: 2em;">
            <ul class="list-group">
              @foreach($taskDetail->getTaskComment as $tKey => $tValue)
               <li class="list-group-item">
                  <div class="col-sm-12 col-lg-12">
                    
                      <?php echo $tValue->task_comments; ?>

                              @if(!$tValue->getCommentAttachment->isEmpty())
                              <p>
                                  @foreach($tValue->getCommentAttachment as $attachmentKey => $attachmentValue)
                                   
                                    <a href="/client/download-file/{{$attachmentValue->attachment_name}}"><i class="fa fa-file" aria-hidden="true"></i></a>
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
                     <button type="button" class="btn btn-primary edit-comment pull-right" data-comment-id="{{$tValue->id}}" id="edit-comment_{{$tValue->id}}">Edit</button>
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
         
       </div>
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
      let taskStatus = $('#task_status').val();
    //  let commentAttachment = $('#task_attachment');
    let commentAttachment = document.getElementById('task_attachment');
    let commentFiles =  commentAttachment.files;
    let formData = new FormData();
   
     formData.append('task_comment',editorData);
     formData.append('task_status',taskStatus);
      if(commentAttachment.value.length != 0)
      {
          formData.append('attachment', commentFiles[0], commentFiles[0].name)
      }
      
      $.ajax({
        url : '/client/add-comment/'+taskId,
        method : 'POST',
        dataType : 'text',
         headers: {
                    'X-CSRF-Token': CSRF_TOKEN 
               },
        // data : {
        //   _token: CSRF_TOKEN,
        //   formdata : formData,
        // //  comment : editorData,
        //   taskstatus : taskStatus,
        //   },
        data : formData,
         contentType: false,
        cache : false,
        processData: false,
        success:function(resp)
        {
         let jsonresp = JSON.parse(resp);
         
         getEditTaskModel(jsonresp.task_id);
          //$("#edit-task-modal").html(resp);
          //$('#edit-task-modal').modal('toggle');
        },
      });
    });

    $('.edit-comment').click(function(){
      let commentId = $(this).attr('data-comment-id');

      $.ajax({
        url : '/client/edit-comment/',
        method : 'POST',
        dataType : 'text',
        data : {
          _token: CSRF_TOKEN,
          comment_id : commentId,
          },
        success:function(resp)
        {
           
          $("#edit-task-modal").html(resp);
         //  $('#edit-task-modal').modal('show');
        },
      });
    });


//     $("#comment-form").submit(function(event){
//        event.preventDefault();

//       //var formData = new FormData($(this)[0]);
//      var formData = new FormData();
    
//       let taskId = $('#task_id').val();
//       console.log(CSRF_TOKEN);
//       $.ajax({
//         url : '/client/add-comment/'+taskId,
//         type : 'POST',
//         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//         // dataType : 'text',
//         // data : {
//         //   _token: CSRF_TOKEN,
//         //   formdata : formData
//         //   // comment : editorData,
//         //   // taskstatus : taskStatus
//         //   },
//         data : $(this).serialize(),
//         success:function(resp)
//         {
//          let jsonresp = JSON.parse(resp);
//          getEditTaskModel(jsonresp.task_id);
//           //$("#edit-task-modal").html(resp);
//           //$('#edit-task-modal').modal('toggle');
//         },
//         // cache: false,
//          //processData: false
//       });

//       // $.ajax({
//       //     url: url to post,
//       //     type: 'POST',
//       //     data: formData,
//       //     success: function (data) {
//       //         alert(data)
//       //     },
//       //     cache: false,
//       //     processData: false
//       // });

//       //return false;
// });


   });
</script>