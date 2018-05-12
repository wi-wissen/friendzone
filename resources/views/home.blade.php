<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon-facebook.ico">

    <title>friendzone</title>

    <!-- jQuery -->
    <script src="{!! asset('js/jquery-1.11.3.min.js') !!}"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.css') !!}" >

    <!-- Bootstrap core JS -->
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/friendzone.css') !!}" >

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{!! asset('js/ie-emulation-modes-warning.js') !!}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">friendzone</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            @if (Auth::check()) {
            <form class="navbar-form navbar-left" role="search" action="/profiles/search" method="get">
              <div class="form-group">
                <input type="text" name="q" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
            @endif
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::check()) {
              @if (Auth::user()->is_admin) { 
                <li class=""><a href="/dba">DB Admin</a></li>
                <li class="active"><a href="/admin">Admin</a></li>
              @else
                <li class="active"><a href="/admin">Admin</a></li>
              @endif   
            @endif
            <li><a href="/about/">About</a></li>
            <li><a href="/contact/">Contact</a></li>
            @if (Auth::check()) {
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/user/password">Change password</a></li>
                <li><a href="/auth/logout">Logout</a></li>
              </ul>
            </li>
            @else
               <li class="active"><a href="/auth/login">Login</a></li>  
            @endif 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      @include('flash::message')

    <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>get friendzoned!</h1>
        <p><i>still beta.</i></p>
        <p>
          <a class="btn btn-lg btn-primary" href="/auth/login" role="button">Login &raquo;</a>
          <a class="btn btn-lg btn-default" href="/auth/register" role="button">Register &raquo;</a>
        </p>
      </div>

    </div> <!-- /container -->

    <footer class="footer">
      <div class="container">
         <div class="row">
            <div class="col-md-6 hidden-xs">
                <p class="text-muted">(c) wi-wissen.de</p>
            </div>
            <div class="col-md-6 text-right">
                <p class="text-muted"><a href="/about">About</a> - <a href="https://wi-wissen.de/contact.php">Contact</a> - <a href="https://wi-wissen.de/agb.html">AGB</a> - <a href="https://wi-wissen.de/datenschutz.html">Privacy</a> - <a href="https://wi-wissen.de/impressum.html">Impress</a></p>
            </div>
        </div>  
       </div>
    </footer>

    <script>
      $('#flash-overlay-modal').modal();
    </script>
    <!--<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>-->
    <script src="js/jquery.backstretch.min.js"></script>
    <script>
        var qu;
        var slogan;

        var random = function(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        };  
        qu = random(0, 6);
        
        switch(qu){
            case 1:
                $.backstretch("/img/bg/braden-barwich-188016.jpg", {transitionDuration: 500});
                break;
            case 2:
                $.backstretch("/img/bg/brooke-cagle-39570.jpg", {transitionDuration: 500});
                break;
            case 3:
                $.backstretch("/img/bg/david-200088.jpg", {transitionDuration: 500});
                break;
            case 4:
                $.backstretch("/img/bg/i-m-priscilla-228050.jpg", {transitionDuration: 500});
                break;
            case 5:
                $.backstretch("/img/bg/jordan-mcqueen-1290.jpg", {transitionDuration: 500});
                break;
            case 6:
                $.backstretch("/img/bg/matheus-ferrero-228716.jpg", {transitionDuration: 500});
                break;
            default:
                $.backstretch("/img/bg/ricky-kharawala-194239.jpg", {transitionDuration: 500});
        }
        
    </script>

  </body>
</html>
