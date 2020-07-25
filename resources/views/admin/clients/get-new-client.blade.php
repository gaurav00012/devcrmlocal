<div class="modal-dialog modal-lg" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Client Details</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
      
         <div class="row">
         <div class="col-md-12 col-sm-12">
         </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Company Name:</label>
               <?php echo Form::text('company_name', $clientDetail->company_name ,['class' => 'form-control','id'=>'company_name','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Contact Name:</label>
               <?php echo Form::text('contact_person', $clientDetail->contact_person ,['class' => 'form-control','id'=>'contact_person','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">E-Mail:</label>
               <?php echo Form::text('email', $clientDetail->email ,['class' => 'form-control','id'=>'email','disabled'=>'disabled']);?>
            </div>
             <div class="col-md-3 col-sm-3">
               <label for="email">Mailing Address:</label>
               <?php echo Form::textarea('mailing_address', $clientDetail->mailing_address ,['class' => 'form-control','id'=>'mailing_address','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Tell us about your business:</label>
               <?php echo Form::textarea('about_business', $clientDetail->about_business ,['class' => 'form-control','id'=>'about_business','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Do you have a domain name? (If not, does one need to be purchased for you?):</label>
               <?php echo Form::text('domain_name', $clientDetail->domain_name ,['class' => 'form-control','id'=>'domain_name','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Do you have access to your hosting? (cPanel/FTP & pHpMyAdmin/ GoDaddy) What are the credentials?</label>
               <?php echo Form::textarea('hosting_access', $clientDetail->hosting_access ,['class' => 'form-control','id'=>'hosting_access','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Where are you hosting your emails?</label>
               <?php echo Form::textarea('hosting_email', $clientDetail->hosting_email ,['class' => 'form-control','id'=>'hosting_email','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Image & video content (Please upload all the content to a google drive/dropbox folder and share it with eldermonks@gmail.com or enter a gmail address below, we will share the folder with you to upload the files):</label>
               <?php echo Form::textarea('content', $clientDetail->content ,['class' => 'form-control','id'=>'content','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Elevator Pitch/ Sales Pitch:</label>
               <?php echo Form::textarea('copy', $clientDetail->copy ,['class' => 'form-control','id'=>'copy','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Define primary goal (Sell Online, Traffic, Contact Form, Lead Generation, Marketing, Informational):</label>
               <?php echo Form::textarea('primary_goal', $clientDetail->primary_goal ,['class' => 'form-control','id'=>'primary_goal','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Target geographic (location):</label>
               <?php echo Form::textarea('target_geographic', $clientDetail->target_geographic ,['class' => 'form-control','id'=>'target_geographic','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Target audience (demographics):</label>
               <?php echo Form::textarea('target_audience', $clientDetail->target_audience ,['class' => 'form-control','id'=>'target_audience','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Pick the word that best describes the message you want to convey:</label>
               <?php echo Form::text('describe_word_1', $clientDetail->describe_word_1 ,['class' => 'form-control','id'=>'describe_word_1','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Pick the word that best describes the feeling you want to convey:</label>
               <?php echo Form::text('describe_word_2', $clientDetail->describe_word_2 ,['class' => 'form-control','id'=>'describe_word_2','disabled'=>'disabled']);?>
            </div>
             <div class="col-md-3 col-sm-3">
               <label for="email">Pick the word that best describes the look you want to convey:</label>
               <?php echo Form::text('describe_word_3', $clientDetail->describe_word_3 ,['class' => 'form-control','id'=>'describe_word_3','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Company Colors:</label>
               <?php echo Form::textarea('company_colors', $clientDetail->company_colors ,['class' => 'form-control','id'=>'company_colors','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Navigation:</label>
               <?php echo Form::textarea('navigation', $clientDetail->navigation ,['class' => 'form-control','id'=>'navigation','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Competitors:</label>
               <?php echo Form::textarea('competitors', $clientDetail->competitors ,['class' => 'form-control','id'=>'competitors','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Reference websites:</label>
               <?php echo Form::textarea('reference', $clientDetail->reference ,['class' => 'form-control','id'=>'reference','disabled'=>'disabled']);?>
            </div>
            
            <div class="col-md-3 col-sm-3">
               <label for="email">Additional Notes:</label>
               <?php echo Form::textarea('additional_notes', $clientDetail->additional_notes ,['class' => 'form-control','id'=>'additional_notes','disabled'=>'disabled']);?>
            </div>
            <div class="col-md-3 col-sm-3">
               <label for="email">Company Logo:</label>
               <a href="{{url('/company_logo/'.$clientDetail->company_logo)}}"><img src="{{url('/company_logo/'.$clientDetail->company_logo)}}" alt="{{$clientDetail->company_logo}}" width="300" height="300"></a>
            </div>
            
           
            
            
            
         </div>
        
      </div>
      
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
   </div>
</div>

<script type= "text/javascript">
    
</script>