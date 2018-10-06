@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h2>Lets add a project</h2>

        {!! Form::open(['action' => 'ProjectController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{ Form::label('image', 'Image') }}
            {{ Form::file('image') }}
        </div>
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'title']) }}
        </div>
        <div class="form-group">
            {{ Form::label('text', 'Text') }}
            {{ Form::textarea('text', '', ['class' => 'form-control', 'placeholder' => 'text']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('submit') }}
        </div>

        {!! Form::close() !!}

    </div>
@endsection