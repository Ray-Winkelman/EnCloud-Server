@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Files</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-error">
                                {{ session('error') }}
                            </div>
                        @endif

                        <table class="table table-hover table-sm">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Filename</th>
                                <th>Type</th>
                                <th>Size</th>
                                <th>Date Uploaded</th>
                                <th>Date Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <th scope="row">{{ $file->id }}</th>
                                    <td><a href="{{ action('FilesController@get', ['id' => $file->id]) }}" >{{ $file->filename }}</a></td>
                                    <td>{{ $file->type }}</td>
                                    <td>{{ $file->formatSizeUnits() }}</td>
                                    <td>{{ $file->created_at }}</td>
                                    <td>{{ $file->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pagination-div">
                            {{ $files->render() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
