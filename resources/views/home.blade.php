@extends('master')
@section('title', 'friendzone')

@section('content')

    <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>get friendzoned!</h1>
        <p><i>still beta.</i></p>
        <p>
          <a class="btn btn-lg btn-primary" href="/auth/login" role="button">Login &raquo;</a>
          <a class="btn btn-lg btn-default" href="/auth/register" role="button">Register &raquo;</a>
        </p>
      </div>

@endsection