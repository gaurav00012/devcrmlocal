<nav class="sidebar sidebar-offcanvas" id="sidebar">
          
          <ul class="nav">
            <!--
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">

               <div class="profile-image">
                 <img src="images/em-crm-logo.png" alt="dev-crm" style="width:70%"/>
                  <div class="dot-indicator bg-success"></div>
                </div> 
            
                <div class="text-wrapper">
                  <p class="profile-name mb-0">{{ Auth::user()->name }}</p>
            <p class="designation">Administrator</p> 
                </div>
          
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
          
              </a>
            </li>-->

            @if(Auth::user()->user_role === 4)
            <!-- 
            <li class="nav-item nav-category">
             <span class="nav-link"><?php echo Form::select('projects', array(''=>'Select Projects'), null, array('class' => 'form-control projects'));?></span>
          </li> -->

          <!-- <li class="nav-item">
              <a class="nav-link"  href="{{ url('admin/manage-projects') }}" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Manage Projects</span>
                <i class="icon-user menu-icon"></i>
              </a>
        </li> -->
       
        <!--   <li class="nav-item">
              <a class="nav-link"  href="{{ url('admin/manage-user') }}" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Manage Admin's</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li> -->

           <li class="nav-item ">
              <a class="nav-link" href="{{ url('super-admin/manage-client') }}" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Manage Companies</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>
            
            @endif
            @if(Auth::user()->user_role === 1)
            <div class="py-3"></div>
            <li class="nav-item">
              <a class="nav-link"  href="{{ url('admin/home')}}" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Dashboard</span>
                <i class="icon-mustache menu-icon"></i>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link"  style="border-top:0px;"  href="{{ url('admin/new-registerations') }}" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Manage New Registrations</span>
                <i class="icon-user menu-icon"></i>
              </a>
        </li>
             <li class="nav-item">
              <a class="nav-link"  href="{{ url('admin/manage-client') }}" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Manage Clients</span>
                <i class="icon-mustache menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link"  href="{{ url('admin/manage-team') }}" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Manage Team</span>
                <i class="icon-people menu-icon"></i>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link"  href="{{ url('admin/manage-ticket') }}" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Manage Ticket</span>
                <i class="icon-people menu-icon"></i>
              </a>
            </li>
            
            @endif
            @if(Auth::user()->user_role === 3)
             <li class="nav-item nav-category">
                <span class="nav-link"> Projects <span class="nav-link">
            </li>
            @endif
             <li class="nav-item nav-category">
                <span class="nav-link"> Settings <span class="nav-link">
            </li>
            <!-- <li class="nav-item nav-category"><span class="nav-link">Setting</span></li> -->
            <!--  <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Other Pages</span>
                <i class="icon-doc menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="#"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="#"> 500 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="#"> Blank Page </a></li>
                </ul>
              </div>
            </li> -->
           
          </ul>
          <div class="overlay"></div>
        </nav>
        <!-- partial -->

<script type="text/javascript">

let companyList = $('.company-list');
$('.company-list').change(function() {
    var selected = $('.company-list option:selected').val();
    //alert(" If you want text ==>"  + selected.val()); 
    $('.projects').html($('<option></option>').attr('value', '').text('Select Projects'));
     $.ajax({
      type: 'POST',
      url: "get-project",
      data: {
        "_token": "{{ csrf_token() }}",
        'companyid':selected
      },
      dataType: "text",
      success: function(resultData) { 
        console.log(resultData);
        let projectsOptions = JSON.parse(resultData);
        console.log(projectsOptions);
          $.each(projectsOptions, function (key, entry) {
           $('.projects').append($('<option></option>').attr('value', key).text(entry));
          })
       }
});
});
    
</script>
