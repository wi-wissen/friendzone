@extends('master')
@section('title', 'Add Post - friendzone')

@section('content')

	<h1>Add Post</h1>

			{!! Form::open(['url' => 'posts']) !!}
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="title">Title:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="title" placeholder="What are you doing?">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="blogpost">Post:</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" name="blogpost" placeholder="What?! Telle me more."></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    {!! Form::hidden('profile_id', $profile->id) !!}
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-primary form-control">Save</button>
			    </div>
			  </div>
			{!! Form::close() !!}

@endsection