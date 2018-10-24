@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="col-lg-8 projects">
            <a href="{{ URL::previous() }}"> < Go back </a>
            <div class="col-lg-12 image">
                <img width="100%" src="/storage/images/{{$project->image}}"/>
            </div>
            <div class="col-lg-12">
                <h2>{{$project->title}}</h2>
                <p>{{$project->text}}</p>
            </div>
        </div>

        <div class="col-lg-4 projects">
            <div class="row border-bottom">
                <div>
                    <p>{{ Auth::user()->name . ' ' . Auth::user()->surname }}</p>
                </div>
            </div>

            <div class="row border-bottom">
                <div class="col-lg-6">
                    <a class="orange-btn" href="/projects/{{$project->id}}/edit"> Edit Project</a>
                </div>
                {!!Form::open(['action'=>['ProjectsController@destroy',$project->id], 'method' => 'POST']) !!}
                <div class="col-lg-6">
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('delete',['class'=> 'delete-btn'])}}
                </div>
                {!! Form::close() !!}

            </div>

            <div class="row border-bottom">
                <p><b>{{ $project->title }}</b></p>
                <br><br>
                <p>tags</p>
            </div>

            <div class="row border-bottom">
                Likes
                views
            </div>
        </div>
    </div>
@endsection