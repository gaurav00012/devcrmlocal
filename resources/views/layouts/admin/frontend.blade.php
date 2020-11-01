<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <!-- FontAwesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- CSS -->
      <link rel="stylesheet" href="{{asset('css/client/style.css')}}">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
     <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    
      <title>CRM</title>
   </head>
   <body class="bg-color-4">
      <!-- Header -->
    <!--   <header id="header" class="bg-color-3 py-3">
         <div class="container d-flex align-items-center justify-content-between">
         <div class="logo">
            <a href="#">
               <?php 
                  // echo '<pre>';
                  // print_r(Auth::user()->userclient->company_logo);
                  // echo '</pre>';
                  $profile = isset(Auth::user()->userclient->company_logo) == '' ? 'images/user-profile/user-avatar.png' : url('company_logo').'/'. Auth::user()->userclient->company_logo ;
               ?>
            <img src="{{$profile}}" alt="logo" width="150" height="50">
            </a>
         </div>
         <div class="notifications small">
            <p class="mb-0 text-white">Welcome Phonenix Solar, to your personalized One Look page. You have <a href="#" class="rounded text-white py-1 px-2 text-decoration-none bg-color-2">6 notifications</a></p>
         </div>
      </header> -->





      <!-- Header -->


      <!-- Header -->
<header id="header" class="bg-color-3 py-3">
   <div class="container d-flex align-items-center justify-content-between">
   <div class="logo flex-grow-1">
      <a href="#">
      <img src="images/logo.png" alt="logo" width="150">
      </a>
   </div>
   <div class="notifications">
      <p class="mb-0 text-white small">Welcome Phonenix Solar, to your personalized One Look page. You have</p>
   </div>
   <div class="notifications-right">
      <ul class="list-unstyled mb-0 ml-3 d-flex">
         <!-- Notifications -->
         <li class="notify-link">
            <a href="javaScript:void(0)" id="notify" class="rounded text-white py-1 px-2 text-decoration-none bg-color-2 small">@yield('notificationCount') Notifications</a>
            <div class="notifications-content" style="display: none;">
               <!-- top box -->
              
               <!-- top box -->
               <!-- MSG Loop -->
               @yield('notification')
              
               <!-- MSG Loop -->
            
            </div>
         </li>
         <!-- Notifications -->
         <!-- Profile -->
            <?php 
                  // echo '<pre>';
                  // print_r(Auth::user()->userclient->company_logo);
                  // echo '</pre>';
                  $profile = isset(Auth::user()->userclient->company_logo) == '' ? 'images/user-profile/user-avatar.png' : url('company_logo').'/'. Auth::user()->userclient->company_logo ;
               ?>
         <li class="profile-img ml-3">
            <a href="javaScript:void(0)" id="profile" class="rounded text-white py-1 px-2 text-decoration-none small"><img src="{{$profile}}" class="rounded-circle" width="25"> {{Auth::user()->name}} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
            <div class="profile-links" style="display: none;">
               <div class="user-img text-center mb-2"><img src="{{$profile}}" class="rounded-circle mb-3" width="95" ><span class="u-name mb-1">{{Auth::user()->name}}</span><span class="u-email"><a href="mailto:abc@mysite.com">{{Auth::user()->email}}</a></span></div>
               <div class="pro-links">
                  <ul class="list-unstyled">
                     <li><a href=""><i class="fa fa-user-o" aria-hidden="true"></i>My Profile</a></li>
                     <li><a href=""><i class="fa fa-envelope-o"></i>Messages</a></li>
                     <li><a href=""><i class="fa fa-bolt" aria-hidden="true"></i>Activity</a></li>
                     <li><a href=""><i class="fa fa-question-circle-o" aria-hidden="true"></i>FAQs</a></li>
                     <li><a href=""><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a></li>
                  </ul>
               </div>
            </div>
         </li>
         <!-- Profile -->
      </ul>
   </div>
</header>
<!-- Header -->




      @yield('content')
     




      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script> 
      @yield('vuejs')
         <script>
   // Notifications 
$("#notify").click(function(){
   $(".notifications-content").toggle();
});
   
  // Profile
$("#profile").click(function(){
   $(".profile-links").toggle();
   $(this).toggleClass("up");
}); 
</script>
   </body>
</html>
