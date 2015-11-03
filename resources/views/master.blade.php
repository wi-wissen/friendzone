<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>

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
            <form class="navbar-form navbar-left" role="search" action="/profiles/search" method="get">
              <div class="form-group">
                <input type="text" name="q" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::check()) {
              @if (Auth::user()->is_admin) { 
                <li class="active"><a href="/dba">Admin</a></li>
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

        @yield('content')

    </div> <!-- /container -->

  </body>
</html>
