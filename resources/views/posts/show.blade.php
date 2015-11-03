@extends('master')
@section('title', 'Post from ' . $post->profile->forename . ' ' .  $post->profile->name . ' - ' . 'friendzone')

@section('content')
		@if (Schema::hasTable('posts'))
			  <h1><a href="{{route('profiles.show',$post->profile->id)}}">{{$post->profile->forename}} {{$post->profile->name}}</a> says:</h1>
			  <div class="list-group-item">
				    <h3 class="list-group-item-heading">{{ $post->title }}</h3>
				    <small>{{ $post->updated_at->format('d.m.Y') }}</small>
				    <p class="list-group-item-text">{{ $post->blogpost }}</p>
			    </div>
			    <table style="border-collapse: separate; border-spacing: 20px 15px; float:right;">
	              <td>
	              	<a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">Edit</a> 
	              </td>
	              <td>
	               	{!! Form::open(['method' => 'DELETE', 'route'=>['posts.destroy', $post->id]]) !!}
			       	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			       	{!! Form::close() !!}
			      </td>
		        </table>




		@endif

@endsection