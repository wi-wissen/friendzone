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

    <title>SQL-Editor</title>

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


    <script src="codemirror/lib/codemirror.js"></script>
  <link rel="stylesheet" href="codemirror/lib/codemirror.css">
  <script src="codemirror/mode/sql/sql.js"></script>
  <style>
.CodeMirror {
	height: auto;
    /* Bootstrap Settings */
    box-sizing: border-box;
    margin: 0;
    font: inherit;
    overflow: auto;
    font-family: inherit;
    display: block;
    width: 100%;
    /*padding: 6px 12px;*/
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    /* Code Mirror Settings */
    font-family: monospace;
    position: relative;
    overflow: hidden;
}

.CodeMirror-focused {
    /* Bootstrap Settings */
    border-color: #66afe9;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

#run {
	margin:5px 0 0;
}

   </style>

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

    <h1>SQL-Editor</h1>
	  <p>In diesem Formular können SQL_Befehle direkt an die Datenbank gerichtet werden.</p>
	  <form action="sql" method="post">
      {{ csrf_field() }}
		<div class="form-group">
		  <label for="comment">SQL-Befehl:</label>
		  <textarea class="form-control" rows="5" name="editor" id="editor"><?php if ($_POST) echo $_POST['editor'] ?></textarea>
		  <p id="run"><button type="submit" class="btn btn-primary btn-block">Ausführen</button></p>
		</div>
	  </form>
      @include('flash::message')
      @if ($result)
        {!! $result->render() !!}
      @endif
	<div class="panel panel-default">
		<div class="panel-body">
		<p> Folgende einzelne Tabellen können abgefragt werden:</p>
        {!! $tables !!}
	</div>


    </div> <!-- /container -->

    <script>
      $('#flash-overlay-modal').modal();
    </script>
    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
            lineNumbers: true,
            mode: "text/x-sql",
            matchBrackets: true,
        });
    </script>
  </body>
</html>