@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <p> Hier gaan we gebruikersinformatie uitlezen</p>
                <p><a href=""> gebruikers informatie toevoegen</a> </p>

            </div>
            <div class="col-lg-8">
                <p> Hier gaan we project informatie uitlezen</p>
                <p> <a href="{{ url('project') }}">Project toevoegen</a> </p>

            </div>
        </div>
    </div>
@endsection