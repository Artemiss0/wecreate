@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 project-view">
        <br>
        <h2>Welcome To The Admin Page
            <br><br>
            {{Auth::user()->name . ' ' . Auth::user()->surname}}
            <br>
        </h2>
{{--        @dd(Auth::guard('admin')->check())--}}
    </div>
</div>
@endsection