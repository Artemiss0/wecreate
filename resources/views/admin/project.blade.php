@extends('layouts.app')
@section('content')
    <div class="row">
        <h2>Projects</h2>
        <div class="col-lg-12">
            {!! Form::open(['action' => 'AdminController@projects', 'method' => 'GET']) !!}
            @csrf
            <div class="form-group">
                {{ Form::label('search', 'Search') }}
                {{ Form::text('search', '', ['class' => 'form-control', 'placeholder' => 'search']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('submit') }}
            </div>
            {!! Form::close() !!}
            <div class="d-flex flex-row">
                <div class="p-2">#</div>
                <div class="p-2">Title</div>
                <div class="p-2">Edit</div>
                <div class="p-2">Delete</div>
            </div>
        </div>
        @foreach($projects as $project)
            <div class="col-lg-12">
                <div class="d-flex flex-row">
                    <div class="p-2">{{$project->id}}</div>
                    <div class="p-2">{{$project->title}}</div>
                    <div class="p-2">Edit</div>
                    <div class="p-2">Delete</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection