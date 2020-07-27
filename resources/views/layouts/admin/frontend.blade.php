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
     <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script> 
      <title>CRM</title>
   </head>
   <body class="bg-color-4">
      <!-- Header -->
      <header id="header" class="bg-color-3 py-3">
         <div class="container d-flex align-items-center justify-content-between">
         <div class="logo">
            <a href="#">
               <?php 
                  $profile = Auth::user()->profile_picture == '' ? 'images/user-profile/user-avatar.png' : 'user-profile/'. Auth::user()->profile_picture ;
               ?>
            <img src="{{$profile}}" alt="logo" width="150" height="50">
            </a>
         </div>
         <div class="notifications small">
            <p class="mb-0 text-white">Welcome Phonenix Solar, to your personalized One Look page. You have <a href="#" class="rounded text-white py-1 px-2 text-decoration-none bg-color-2">6 notifications</a></p>
         </div>
      </header>
      <!-- Header -->




      @yield('content')
     




      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      @yield('vuejs')
   </body>
</html>