@extends('master')
@section('title', $profile->forename . ' ' . $profile->name . ' - ' . 'friendzone')

@section('content')

	
		<div class="media"> 
      		<div class="media-left">
			    <a href="/profiles/{{ $profile->id }}">
			      <img class="media-object" style="height: 360px; width: auto;" src="/profile_images/{{ $profile->id }}.jpg" alt="image of {{ $profile->forename }} {{ $profile->name }}" onerror="this.onerror=null;this.src='/profile_images/0.jpg';">
			    </a>
			</div>
			<div class="media-body">
			  <h1 class="media-heading">{{ $profile->forename }} {{ $profile->name }}</h1>
			   <table style="width:100%">
				  <tr>
				    <td>Gender</td>
				    <td>{{ $profile->gender }}</td>
				  </tr>
				  <tr>
				    <td>Resident</td>
				    <td>{{ $profile->street }} in {{ $profile->zipcode }} {{ $profile->city }}</td>
				  </tr>
				  <tr>
				    <td>Mail</td>
				    <td>{{ $profile->mail }}</td>
				  </tr>
				  <tr>
				    <td>Telephone</td>
				    <td>{{ $profile->telephone }}</td>
				  </tr>
				  <tr>
				    <td>Favorite color</td>
				    <td style="color: {{ $profile->color }};">{{ $profile->color }}</td>
				  </tr>
				  <tr>
				    <td>Height</td>
				    <td>{{ $profile->centimeters }} cm</td>
				  </tr>
				</table>
			</div>
		</div>



		@if (Schema::hasTable('profile_profile'))
			<h2>Followers</h2>
			@if ($profile->sheIsWantedFriend->count() > 0)
			<div class="row">
				@foreach ($profile->sheIsWantedFriend as $friend)
				  <div class="col-xs-6 col-md-2">
				    <a href="/profiles/{{ $friend->id }}" class="thumbnail">
				      <img src="/profile_images/{{ $friend->id }}.jpg" style="height: 120px; width: auto;" alt="{{ $friend->forename }} {{ $friend->name }}">
				    </a>
				  </div>
			  	@endforeach
			</div>
			@else
				 <p>
				  {{ $profile->forename }} {{ $profile->name }} has no followers. 
				</p>  
			@endif

			<h2>Following</h2>
			@if ($profile->herWantedFriends->count() > 0)
			<div class="row">
				@foreach ($profile->herWantedFriends as $friend)
				  <div class="col-xs-6 col-md-2">
				    <a href="/profiles/{{ $friend->id }}" class="thumbnail">
				      <img src="/profile_images/{{ $friend->id }}.jpg" style="height: 120px; width: auto;" alt="{{ $friend->forename }} {{ $friend->name }}">
				    </a>
				  </div>
			  	@endforeach
			</div>
			@else
				 <p>
				  {{ $profile->forename }} {{ $profile->name }} follows nobody. 
				</p>  
			@endif
		@endif

		@if (Schema::hasTable('posts'))
			{!! link_to_route('profiles.posts.create', 'Add Post', $profile->id, array('style'  => "float:right;", 'class' => "btn btn-success")) !!}
			<h2>Blog</h2> 
			@if ($profile->posts->count() > 0)
				<div class="list-group">
				  @foreach ($profile->posts as $post)
						    <a href="/posts/{{ $post->id }}" class="list-group-item">
						    	<h3 class="list-group-item-heading">{{ $post->title }}</h3>
							    <small>{{ $post->updated_at->format('d.m.Y') }}</small>
							    <p class="list-group-item-text">{{ $post->blogpost }}</p>
						    </a>
				  @endforeach
				</div>
			@else
			 <p>
			  {{ $profile->forename }} {{ $profile->name }} haven't created any posts. 
			</p>  
			@endif
		@endif

@endsection