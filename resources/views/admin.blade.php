@extends('master')
@section('title', 'friendzone - adminpanel')

@section('content')
    <h1>Adminpanel</h1>

 	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Database</h3>
	  </div>
	  <div class="panel-body">
	    <b>User:</b> friendzone_{{ Auth::user()->id }} <br />
		<b>Password:</b> {{ Auth::user()->db_password }} <br />
		<a class="btn btn-default" href="http://{{getenv('PHPMYADMIN')}}/?pma_username=friendzone_{{ Auth::user()->id }}&pma_password={{ Auth::user()->db_password }}" role="button">Login phpMyAdmin</a>
	  </div>
	</div>

	@if (Schema::hasTable('profiles'))
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Member</h3>
		  </div>
		  <div class="panel-body">
			<a class="btn btn-default" href="/profiles" role="button">View all Members</a> &nbsp;
			<a href="{{url('/profiles/create')}}" class="btn btn-success">Add Member</a>
		  </div>
		</div>
	@else
		<div class="alert alert-danger" role="alert">Can't find Profiles Table!</div>
	@endif

@endsection