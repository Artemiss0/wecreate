@extends('layouts.app')

@section('content')
    <div class="header">
        <div class="col-4 text">
            <h1 class="orangeBk"> Join.create.share</h1>
            <h3>
                <a href="{{ route('login') }}"> {{ __('Sign up now >') }} </a>
            </h3>
        </div>
    </div>
@endsection