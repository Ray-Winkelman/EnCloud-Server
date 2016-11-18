@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hi, {{ Auth::user()->name }}.</div>

                <div class="panel-body">
                    <p>What should we do today?</p>

                    <ul>
                        <li><a href="{{ url('/upload') }}">Upload a file.</a></li>
                        <li><a href="{{ url('/files') }}">View encrypted files.</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
