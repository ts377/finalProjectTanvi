@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My Profile</div>
                    <div class="card-body">
                        @if($edit === FALSE)
                            {!! Form::model($profile, ['route' => ['profile.store', Auth::user()->id], 'method' => 'post']) !!}
                        @else()
                            {!! Form::model($profile, ['route' => ['profile.update', Auth::user()->id, $profile->id], 'method' => 'patch']) !!}
                        @endif
                            <div class="form-group {{ $errors->has('fname') ? 'has-error' : ''}}">
                            {!! Form::label('fname', 'First Name') !!}
                            {!! Form::text('fname',null, $profile->fname, ['class' => 'form-control','required' => 'required']) !!}
                                {!! $errors->first('fname', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('lname') ? 'has-error' : ''}}">
                            {!! Form::label('lname', 'Last Name') !!}
                            {!! Form::text('lname',null, $profile->lname, ['class' => 'form-control','required' => 'required']) !!}
                            {!! $errors->first('fname', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('body', 'Body') !!}
                            {!! Form::text('body', $profile->body, ['class' => 'form-control']) !!}
                        </div>
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Save
                        </button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
