@extends('master')
@section('title', 'friendzone - members')

@section('content')

		<a style="float:right;" class="btn btn-lg btn-default" href="/search" role="button">Advanced Search</a>

		@if ($profiles->count() > 0)

			@foreach ($profiles as $profile) 
				<div class="media"> 
		      		<div class="media-left">
					    <a href="/profiles/{{ $profile->id }}">
					      <img class="media-object" style="height: 120px; width: auto;" src="/profile_images/{{ $profile->id }}.jpg" alt="image of {{ $profile->forename }} {{ $profile->name }}" onerror="this.onerror=null;this.src='/profile_images/0.jpg';">
					    </a>
					</div>
					<div class="media-body">
					  <h4 class="media-heading"><a href="/profiles/{{ $profile->id }}">{{ $profile->forename }} {{ $profile->name }}</a></h4>
					  {{ $profile->street }} in {{ $profile->zipcode }} {{ $profile->city }} <br />

					  <table style="border-collapse: separate; border-spacing: 20px 5px;">
						  <td>
						  	<a href="{{url('profiles',$profile->id)}}" class="btn btn-primary">View</a> 
						  </td>
	             		  <td>
	             		  	<a href="{{route('profiles.edit',$profile->id)}}" class="btn btn-warning">Edit</a> 
	                      </td>
	                      <td>
	                      	{!! Form::open(['method' => 'DELETE', 'route'=>['profiles.destroy', $profile->id]]) !!}
			              	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			              	{!! Form::close() !!}
			              </td>
		              </table>
             </td>
					</div>
				</div>
			@endforeach
		@else
			 <p>
			  no members. 
			</p>  
			@endif

		{!! $profiles->render() !!}
     

@endsection