@extends('layouts.app')
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/like.js')}}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

@endsection
@section('content')
    <div class="row">
{{--        @dd($userFavorites->count())--}}
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
                        <div class="panel-footer">
                            <favorite
                                    :post={{ $project->id }}
                                            :favorited={{ $project->favorited() ? 'true' : 'false' }}
                            ></favorite>
                        </div>
                        <p>Project likes:
                            {{$favorites->count()}}
                        </p>

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
                        @csrf
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
    <div class="row border-top">
        <div class="col-lg-12 comments">
            @if($userFavorites->count() >= 3)
                <h3>Comments</h3>
                {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST']) !!}
                @csrf
                <div class="form-group">
                    {{ Form::label('comment', 'Leave a comment down below') }}
                    {{ Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'comment']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('submit') }}
                </div>
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection