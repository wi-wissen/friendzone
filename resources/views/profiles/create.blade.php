@extends('master')
@section('title', 'Add Member - friendzone')

@section('content')

	<h1>Add Member</h1>

	{!! Form::open(['url' => 'profiles']) !!}
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="forename">Forename:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="forename" placeholder="Forename">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="name">Lastname:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="name" placeholder="Lastname">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="gender">Gender:</label>
	    <div class="col-sm-10">
	      <select class="form-control" name="gender">
		    <option>female</option>
		    <option>male</option>
		  </select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="street">Street:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="street" placeholder="Hoheluftchaussee 24">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="name">City:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="city" placeholder="Großpösna">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="zipcode">Zipcode:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="zipcode" placeholder="04463">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="mail">Email:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="mail" placeholder="me@friendzone.app">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="telephone">Telephone/Mobile:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="telephone" placeholder="+49 034297 51 61">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="color">Favorite color:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="color" placeholder="Blue">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="centimeters">Heigh (in cm):</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="centimeters" placeholder="167">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary form-control">Add</button>
	    </div>
	  </div>
	{!! Form::close() !!}

@endsection