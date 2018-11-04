@extends('layouts.app')
@section('header')

@endsection
@section('subnav')
    @include('inc.searchnav')
@endsection

@section('content')
    <div class="row">
        @if(count($projects) > 0)
            @foreach($projects as $project)
                <div class="col-lg-3 project">
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
        @else
            <p>no projects found</p>
        @endif
    </div>

@endsection