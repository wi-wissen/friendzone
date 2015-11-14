@extends('master')
@section('title', 'User ' . $user->id . ' - ' . 'friendzone')

@section('content')

	<a style="float:right;" class="btn btn-default" href="http://{{getenv('PHPMYADMIN')}}/?pma_username=friendzone_{{ Auth::user()->id }}&pma_password={{ Auth::user()->db_password }}" role="button">Login phpMyAdmin</a>
	<h1>{{ $user->name }}</h1>
	
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Table Profiles @if (Schema::hasTable('profiles')) ({{DB::table('profiles')->count()}}) @endif</h3>
	  </div>
	  <div class="panel-body">
	  	@if (Schema::hasTable('profiles'))
			<a class="btn btn-danger" href="/dba/drop/profiles/{{ $user->id }}" role="button">Drop Profiles</a> &nbsp;
			@if (DB::table('profiles')->count())
				<a class="btn btn-warning" href="/dba/truncate/profiles/{{ $user->id }}" role="button">Truncate Profiles</a> &nbsp;
			@else
				<a class="btn btn-warning" href="/dba/insert/profiles/{{ $user->id }}" role="button">Insert Profiles</a> &nbsp;
			@endif
		@else
			<a class="btn btn-success" href="/dba/create/profiles/{{ $user->id }}" role="button">Create Profiles</a> &nbsp;
		@endif
		
	  </div>
	</div>

<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Table Posts @if (Schema::hasTable('posts')) ({{DB::table('posts')->count()}}) @endif</h3>
	  </div>
	  <div class="panel-body">
	  	@if (Schema::hasTable('posts'))
			<a class="btn btn-danger" href="/dba/drop/posts/{{ $user->id }}" role="button">Drop Posts</a> &nbsp;
			@if (DB::table('posts')->count())
				<a class="btn btn-warning" href="/dba/truncate/posts/{{ $user->id }}" role="button">Truncate Posts</a> &nbsp;
			@else
				<a class="btn btn-warning" href="/dba/insert/posts/{{ $user->id }}" role="button">Insert Posts</a> &nbsp;
			@endif
		@else
			<a class="btn btn-success" href="/dba/create/posts/{{ $user->id }}" role="button">Create Posts</a> &nbsp;
		@endif

	  </div>
	</div>

<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Table Profile_Profile @if (Schema::hasTable('profile_profile')) ({{DB::table('profile_profile')->count()}}) @endif</h3>
	  </div>
	  <div class="panel-body">
	  	@if (Schema::hasTable('profile_profile'))
			<a class="btn btn-danger" href="/dba/drop/profile_profile/{{ $user->id }}" role="button">Drop Profile_Profile</a> &nbsp;
			@if (DB::table('profile_profile')->count())
				<a class="btn btn-warning" href="/dba/truncate/profile_profile/{{ $user->id }}" role="button">Truncate Profile_Profile</a> &nbsp;
			@else
				<a class="btn btn-warning" href="/dba/insert/profile_profile/{{ $user->id }}" role="button">Insert Profile_Profile</a> &nbsp;
			@endif
		@else
			<a class="btn btn-success" href="/dba/create/profile_profile/{{ $user->id }}" role="button">Create Profile_Profile</a> &nbsp;
		@endif

	  </div>
	</div>
		
@endsection