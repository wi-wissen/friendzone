@extends('master')
@section('title', 'Edit Member - friendzone')

@section('content')

	<h1>Edit Member</h1>

	{!! Form::model($profile,['method' => 'PATCH','route'=>['profiles.update',$profile->id]]) !!}
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="forename">Forename:</label>
	    <div class="col-sm-10">
	      {!! Form::text('forename',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="name">Lastname:</label>
	    <div class="col-sm-10">
	      {!! Form::text('name',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="gender">Gender:</label>
	    <div class="col-sm-10">
	      {!! Form::select('gender', ['female' => 'female', 'male' => 'male'], null, ['class' => 'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="street">Street:</label>
	    <div class="col-sm-10">
	      {!! Form::text('street',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="city">City:</label>
	    <div class="col-sm-10">
	      {!! Form::text('city',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="zipcode">Zipcode:</label>
	    <div class="col-sm-10">
	      {!! Form::text('zipcode',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="country">Country:</label>
	    <div class="col-sm-10">
	      {!! Form::text('country',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="mail">Email:</label>
	    <div class="col-sm-10">
	      {!! Form::text('mail',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="telephone">Telephone/Mobile:</label>
	    <div class="col-sm-10">
	      {!! Form::text('telephone',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="color">Favorite color:</label>
	    <div class="col-sm-10">
	      {!! Form::text('color',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="centimeters">Heigh (in cm):</label>
	    <div class="col-sm-10">
	      {!! Form::text('centimeters',null,['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="password">Password:</label>
	    <div class="col-sm-10">
	      {!! Form::password('password',['class'=>'form-control']) !!}
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary form-control">Save</button>
	    </div>
	  </div>
	{!! Form::close() !!}

@endsection