<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <title>d{everybody}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    
  <link rel="stylesheet" href="css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href="css/layout.css" rel="stylesheet">

</head>

<body class="logbg">
  <div class="overlay"></div>
  <header>
  </header>
  <nav></nav>
  <main>  
    <section>
      <div class="container">
        <div class="row align-items-center justify-content-center">          
          <div class="col-lg-5 col-md-10 col-sm-12">
            <div class="regibox">
              <div class="text-center"><img src="images/em-crm-logo.png" alt="dev-crm" style="width:70%"/></div>
             
         
          
            <form  class="registerbox" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                   
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                           

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>




            <div class="form-group">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
             


              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror



            </div>






            <div class="form-group">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
               
              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>

            <div class="form-group">
              <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
             
            </div>

           <!--  <div class="form-group">
              <div class="form-check">
                <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                <label class="" for="">
                  I accept the <a href="#">Terms of Use</a> & <a href="#">Privacy Policy</a>.
                </label>                
              </div>
            </div> -->

            <div class="form-group text-center">
              <button type="submit" class="btn btn-login">SIGN UP</button>
            </div>
            
            <p class="text-center">Already have an account? <a href="login.html">Login in</a></p>
          </form>
        </div>

        </div>
      </div>
    </div>
    </section>
  </main>
  <footer></footer>
</body>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!--<script src="js/jquery.js"></script>-->
<script src="js/bootstrap.min.js"></script>

</html>