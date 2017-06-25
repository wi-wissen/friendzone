@extends('master')
@section('title', 'friendzone - set new password')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Set Password</div>
                    <div class="panel-body">
                        {!! Form::open(array('url' => URL::to('user/password'), 'method' => 'post', 'files'=> true)) !!}
                        <div class="form-group  {{ $errors->has('old_password') ? 'has-error' : '' }}">
                            {!! Form::label('old_password', "Old Password", array('class' => 'control-label')) !!}
                            <div class="controls">
                                {!! Form::password('old_password', array('class' => 'form-control')) !!}
                                <span class="help-block">{{ $errors->first('old_password', ':message') }}</span>
                            </div>
                        </div>
                        <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                            {!! Form::label('password', "New Password", array('class' => 'control-label')) !!}
                            <div class="controls">
                                {!! Form::password('password', array('class' => 'form-control')) !!}
                                <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                            </div>
                        </div>
                        <div class="form-group  {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            {!! Form::label('password_confirmation', "Confirm new Password", array('class' => 'control-label')) !!}
                            <div class="controls">
                                {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                                <span class="help-block">{{ $errors->first('password_confirmation', ':message') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Set Password
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection