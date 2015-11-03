@extends('master')
@section('title', 'friendzone - members')

@section('content')


 <form class="form-horizontal" role="search" action="/profiles/advancedsearch" method="get">
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
	    <option></option>
	    <option>female</option>
	    <option>male</option>
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">City:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="city" placeholder="City">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="color">Favorite color:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="color" placeholder="Favorite color">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Search</button>
    </div>
  </div>
</form>
     

@endsection