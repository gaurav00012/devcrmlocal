<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <title>Uleadswell</title>
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
            <div class="loginbox">
              <div class="text-center"><img src="images/em-crm-logo.png" alt="dev-crm" style="width:70%"/></div>
            <h3></h3>
            <p> </p>
           <form method="POST" action="{{ route('login') }}">
                        @csrf
              <div class="form-group">
                <!--<label for="email">Email address</label>-->
                       
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email/Username" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror        
                <div class="invalid-feedback">
                  Please enter email id.
                </div>
              </div>
              <div class="form-group">
               <!-- <label for="password">Password</label>-->
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <div class="invalid-feedback">
                  Please enter password.
                </div>
              </div>
             

              <div class="form-group text-center">
                <!--<button type="submit" class="btn btn-primary">LOGIN</button>-->
                <button type="submit" class="btn btn-login">
                                    {{ __('Login') }}
                                </button>
              </div>
              <p class="text-center">                
                <a href="forgot-password.html">Forgot Password?</a>
                <br>
                Don't have an account yet? <a href="register.html">Sign Up!</a>
             
            </p>
            
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