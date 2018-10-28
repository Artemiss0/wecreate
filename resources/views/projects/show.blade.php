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
                @if(!Auth::guest())
                    <div>
                        {{--{{ Auth::user()->name . ' ' . Auth::user()->surname }}--}}
                        <p><b>User: </b></p>
                        <p><b>Created at:</b> {{$project->created_at}}</p>
                        <p><b>Tags:</b>
                            @foreach($tags as $tag)
                                {{$tag->name}}
                            @endforeach
                        </p>
                        <p><b>Likes:</b></p>
                        <p><b>Views:</b></p>
                    </div>
                @endif
            </div>

            <div class="row border-bottom">
                @if(!Auth::guest())
                    @if(Auth::user()->id == $project->user_id)
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
            @endif
            @endif
        </div>
    </div>
@endsection