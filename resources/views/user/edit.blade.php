@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h2>Edit project</h2>

        {!! Form::open(['action' => ['UserController@update', $users->id], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', $users->email, ['class' => 'form-control', 'placeholder' => 'email']) }}
        </div>
        <div class="form-group">
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', $users->phone, ['class' => 'form-control', 'placeholder' => 'phone']) }}
        </div>
        <div class="form-group">
            {{ Form::label('country', 'Country') }}
            {{ Form::text('country', $users->country, ['class' => 'form-control', 'placeholder' => 'country']) }}
        </div>
        <div class="form-group">
            {{ Form::label('city', 'City') }}
            {{ Form::text('city', $users->city, ['class' => 'form-control', 'placeholder' => 'city']) }}
        </div>
        <div class="form-group">
            {{ Form::label('about', 'About me') }}
            {{ Form::textarea('about', $users->about, ['class' => 'form-control', 'placeholder' => 'about me']) }}
        </div>
        <div class="form-group">
            {{ Form::label('occupation', 'Occupation') }}
            {{ Form::text('occupation', $users->occupation, ['class' => 'form-control', 'placeholder' => 'occupation']) }}
        </div>
        <div class="form-group">
            {{ Form::label('website', 'Website') }}
            {{ Form::text('website', $users->phone, ['class' => 'form-control', 'placeholder' => 'website']) }}
        </div>
        <div class="form-group">
            {{ Form::hidden('invisible', 'secret', array('id' => 'invisible_id')) }}
        </div>
        <div class="form-group">
            {{Form::hidden('_method', 'PUT')}}
            {{ Form::submit('submit') }}
        </div>
        {!! Form::close() !!}
    </div>
@endsection