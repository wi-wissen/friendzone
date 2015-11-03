@extends('master')
@section('title', 'Edit Post - friendzone')

@section('content')

	<h1>Edit Post</h1>

	{!! Form::model($post,['method' => 'PATCH','route'=>['posts.update',$post->id]]) !!}
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="title">Title:</label>
	    <div class="col-sm-10">
	      {!! Form::text('title',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="blogpost">Post:</label>
	    <div class="col-sm-10">
	      {!! Form::textarea('blogpost',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    {!! Form::hidden('profile_id', null) !!}
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary form-control">Save</button>
	    </div>
	  </div>
	{!! Form::close() !!}

@endsection