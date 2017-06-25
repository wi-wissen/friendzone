@extends('master')
@section('title', 'About')

@section('content')
    <h1>About Page</h1>
    <div class="alert alert-warning">This website is for educational purposes only!</div>

    <h2>Made with</h2>
       <ul>
            <li>Dreams and commitment</li>
            <li><a href="https://www.mysql.com/">MySQL</a></li>
            <li><a href="http://php.net/">php</a></li>
            <li><a href="https://laravel.com/">Laravel</a></li>
            <li>Packages from <a href="http://github.com/">GitHub</a> for Laravel: laracasts/flash, rap2hpoutre/laravel-log-viewer, barryvdh/laravel-debugbar, gbrock/laravel-table</li>
            <li><a href="http://bootstrap.com/">Bootstrap</a></li>
            <li><a href="https://jquery.com/">jQuery</a> with <a href="https://github.com/jquery-backstretch/jquery-backstretch">Backstretch</a> </li>  
        </ul>
    <h2>Images</h2>
    <ul>
        <li> Kitten by <a href="https://www.flickr.com/photos/nicsuzor/">Nicolas Suzor</a> (CC BY-NC-SA) </li>
        <li> Splashs by <a href="https://unsplash.com/">unsplash.com</a> (CCO) </li>
        <li> Faces by <a href="https://www.flickr.com/photos/gregpc/">Greg Peverill-Conti</a> (CC BY-NC-SA 2.0)</li>
    </ul>

@endsection