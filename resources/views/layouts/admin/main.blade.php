
@include('common.header')
  

@include('common.navigation-top')


 @include('common.sidebar')
        






        <div class="main-panel">
          <div class="content-wrapper">

          <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">
                <div class="card card-secondary chatbox">
                                    
                      <div class="row overflow-hidden">
                        <!-- Users box-->
                       
                        <!-- Chat Box-->
                        <div class="col-12 px-0 content">
                          <div class="contact-profile">
                          <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" style="display:none">
                            <p style="margin-left:2em">@yield('heading')</p>                           
                          </div>                         

                          <div class="px-4 py-4  bg-white">
                            
                            
                    
                         
                    
                          @yield('content')
                    
                           
                    
                            
                    
                           
                    
                          </div>
                    
                        
                          
                    
                        </div>
                      </div>                   
                  
                </div>
              </div>
            </div>





          















            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                &nbsp;
              </div>
              <div class="col-md-8 grid-margin stretch-card">
               &nbsp;
              </div>
            </div>
            <!-- Quick Action Toolbar Starts-->
            <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                &nbsp;
              </div>
            </div>
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         @yield('vuejs')
          @yield("customjs")
         @include('common.footer')