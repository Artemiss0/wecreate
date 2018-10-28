@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h2>Lets add a tag</h2>

        {!! Form::open(['action' => 'TagsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'name']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('submit') }}
        </div>
        {!! Form::close() !!}
    </div>
@endsection