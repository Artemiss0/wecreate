@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <h2>Existing Tags</h2>
                <div class="d-flex flex-row">
                    <div class="p-2"> #</div>
                    <div class="p-2"> Tagname</div>
                </div>
                @foreach($tags as $tag)
                    <div class="d-flex flex-row">
                        <div class="p-2"> {{$tag->id}}</div>
                        <div class="p-2"> {{$tag->name}}</div>
                    </div>
                @endforeach


            </div>
            <div class="col-lg-6">
                <h2>Lets add a tag</h2>
                {!! Form::open(['action' => 'TagsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'name']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('submit') }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection