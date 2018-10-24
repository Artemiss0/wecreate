@extends('layouts.profileLayout')
@section('profile')
    <div class="d-flex justify-content-between border-bottom">
        <h3>{{ Auth::user()->name . ' ' . Auth::user()->surname }}</h3>
    </div>
    <div class="border-bottom">
        <p><b>Email: </b>{{ Auth::user()->email}}</p>
        <p><b>Phone: </b> - </p>
        <p><b>City: </b> - </p>
        <p><b>Country: </b> - </p>
    </div>
    <div class="border-bottom">
        <p><b>About me</b></p>
        <p> - </p>
    </div>
    <div class="border-bottom">
        <p><b>Occupation</b></p>
        <p> - </p>
    </div>
    <div class="border-bottom">
        <p><b>On the web</b></p>
        <p> - </p>
    </div>


    <p><a class="orange-btn" href=""> Edit user information</a></p>
@endsection

@section('projects')
    <div class="d-flex justify-content-between border-bottom">
        <h3> {{ $title }}</h3>
        <p><a class="orange-btn" href="{{ url('/projects/create') }}">Create Project</a></p>
    </div>
    <div class="row">
        @if(count($projects) > 0)
            @foreach($projects as $project)
                <div class="col-lg-4 project">
                    <div class="project-image">
                        <img src="/storage/images/{{$project->image}}"/>
                    </div>
                    <div class="project-text">
                        <a href="/projects/{{$project->id}}">
                        <h4>{{ $project->title }}</h4>
                        </a>
                    </div>
                </div>
            @endforeach
    </div>
    @else
        <p>no projects found</p>
    @endif
@endsection