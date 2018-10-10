@extends('layouts.profileLayout')
@section('projects')
    <h2>Projects</h2>
    <p> Hier gaan we project informatie uitlezen</p>
    <p> <a href="{{ url('projects') }}">Project toevoegen</a> </p>

    <h2>Projects view</h2>
    @if(count($projects) > 0)
        @foreach($projects as $project)
            <div class="well">
                <h3>{{ $project->title }}</h3>
            </div>
        @endforeach

    @else
        <p>no projects found</p>
    @endif
@endsection
