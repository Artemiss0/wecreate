@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ URL::previous() }}" class="goback"> < Go back </a>
        </div>
        <div class="col-lg-8 projects">
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
                    <div class="col-lg-12">
                        <p class="border-bottom">
                            <b>{{$project->title}}</b>
                            <br>
                            <i class="fas fa-heart"></i>
                            {{$favorites->count()}}
                        </p>
                        @if(Auth::user()->id == $project->user_id)
                            <div class="border-bottom editlinks">

                                <a href="/projects/{{$project->id}}/edit"> <i class="fas fa-edit"></i> Edit Project</a>
                                <br>
                                {!!Form::open(['action'=>['ProjectsController@destroy',$project->id], 'method' => 'POST']) !!}
                                @csrf
                                {{Form::hidden('_method', 'DELETE')}}
                                <i class="fas fa-trash-alt"></i>
                                {{Form::submit('Delete',['class'=> 'delete'])}}
                                {!! Form::close() !!}

                            </div>
                        @endif
                        <p class="heart">
                            <favorite
                                    :post={{ $project->id }}
                                            :favorited={{ $project->favorited() ? 'true' : 'false' }}
                            ></favorite>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row border-top">
        <div class="col-lg-12">

        </div>
        <div class="col-lg-12 leaveComment">
            @if(!Auth::guest())
                @if($userFavorites->count() >= 3)
                    <h3>Comments</h3>
                    {!! Form::open(['action' => 'ProjectsController@comments', 'method' => 'POST']) !!}
                    @csrf
                    <div class="form-group">
                        {{ Form::label('comment', 'Leave a comment down below') }}
                        {{ Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'comment']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::hidden('invisible', 'secret', array('id' => 'invisible_id')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::hidden('project_id', $project->id)}}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('submit') }}
                    </div>
                    {!! Form::close() !!}

                    @if(count($comments) > 0)
                        @foreach($comments as $comment)
                            <div class="well">
                                <p class="border-top">{{ $comment->body }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>no comments found</p>
                    @endif
                @endif
            @endif
        </div>
    </div>
@endsection