@extends('layouts.profileLayout')
@section('profile')
    <div class="d-flex justify-content-between border-bottom">
        <h3>{{ Auth::user()->name }}</h3>
    </div>
    <p> Hier gaan we gebruikersinformatie uitlezen</p>
    <p><a href=""> gebruikers informatie toevoegen</a></p>
@endsection

@section('projects')
    <div class="d-flex justify-content-between border-bottom">
        <h3>{{ $title }}</h3>
        <p><a class="orange-btn" href="{{ url('/projects/create') }}">Create Project</a></p>
    </div>
    <div class="row">
        @if(count($projects) > 0)
            @foreach($projects as $project)
                <div class="col-lg-4 project">
                    <div class="project-image">
                        <img src="{{ url('/images/john-jennings-430220-unsplash.jpg') }}"/>
                    </div>
                    <div class="project-text">
                        <h4>{{ $project->title }}</h4>
                    </div>
                </div>
            @endforeach
    </div>
    @else
        <p>no projects found</p>
    @endif
@endsection