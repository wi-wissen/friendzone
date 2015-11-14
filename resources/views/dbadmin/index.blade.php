@extends('master')
@section('title', 'friendzone - adminpanel')

@section('content')
    <h1>DBA Panel</h1>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Database</h3>
	  </div>
	  <div class="panel-body">
	  	<div style="float:left;">
	    <b>User:</b> friendzone_{{ Auth::user()->id }} <br />
		<b>Password:</b> {{ Auth::user()->db_password }} <br />
		<a class="btn btn-default" href="http://{{getenv('PHPMYADMIN')}}/?pma_username=friendzone_{{ Auth::user()->id }}&pma_password={{ Auth::user()->db_password }}" role="button">Login phpMyAdmin</a>
		</div>
		<div style="float:right;">
	    <b>User:</b> friendzone <br />
		<b>Password:</b> ********** <br />
		<a class="btn btn-primary" href="http://{{getenv('PHPMYADMIN')}}/?pma_username=friendzone" role="button">Login phpMyAdmin</a>
		</div>
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

	<div class="panel panel-primary">
		<div class="panel-heading">
		    <h3 class="panel-title">User</h3>
		  </div>
		<div class="panel-body">
			<table class="table table-striped table-hover">
		     <thead>
			     <tr class="bg-info">
			         <th>Id</th>
			         <th>Registered at</th>
			         <th>Name</th>
			         <th>phpMyAdmin</th>
			         <th>Manage</th>
			     </tr>
		     </thead>
		     <tbody>
			 @forelse ($users as $user)
			 <tr>
			 	<td>{{ $user->id }}</td>
			 	<td>{{ $user->created_at->format('d.m.Y') }}</td>
				<td>{{ $user->name }}</td>
				<td><a class="btn btn-default" href="http://{{getenv('PHPMYADMIN')}}/?pma_username=friendzone_{{ $user->id }}&pma_password={{ $user->db_password }}" role="button">Login as {{ $user->id }}</a></td>
				<td><a class="btn btn-primary" href="dba/user/{{ $user->id }}">Manage {{ $user->id }}</a></td>
			</tr>
			 @empty
			 <tr>
			 	<td></td>
			 	<td></td>
				<td>No registered users</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			 	<li>No registered users</li>
			 @endforelse
			</tbody>
			</table>
		</div>
	</div>

@endsection