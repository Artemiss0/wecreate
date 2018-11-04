@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h2>Edit project</h2>

        {!! Form::open(['action' => ['ProjectsController@update', $project->id], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('image', 'Image',['class' => 'control-label']) }}
            {{ Form::file('image') }}
        </div>
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $project->title, ['class' => 'form-control', 'placeholder' => 'title']) }}
        </div>
        <div class="form-group">
            {{ Form::label('text', 'Text') }}
            {{ Form::textarea('text', $project->text, ['class' => 'form-control', 'placeholder' => 'text']) }}
        </div>
        <div class="form-group">
            {{ Form::label('tags', 'Tag') }}
            <select multiple class="form-control" id="exampleFormControlSelect2" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('users', 'UserController') }}
            <select multiple class="form-control" id="exampleFormControlSelect2" name="tags[]">
                @foreach($users as $user)
                    <option value="{{ $user->id }}"> {{ $user->name }}</option>
                @endforeach
            </select>
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