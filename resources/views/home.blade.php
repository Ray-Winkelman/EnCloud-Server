@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Hi, {{ Auth::user()->name }}.</div>

                <div class="panel-body">
                    @if (session('alert'))
                        <div class="alert alert-{{ session('alert')[0] }}">
                            {{ session('alert')[1] }}
                        </div>
                    @else
                        <p>What should we do today?</p>
                    @endif

                    <ul>
                        <li><a href="{{ url('/upload') }}">Upload a new file.</a></li>
                        <li><a href="{{ url('/files') }}">View your encrypted files.</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
