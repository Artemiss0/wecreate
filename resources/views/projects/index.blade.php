@extends('layouts.app')
@section('content')
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
