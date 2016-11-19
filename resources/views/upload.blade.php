@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Upload Your File(s).</div>

                    <div class="panel-body">
                        <label class="control-label">Select File</label>
                        {{ Form::open(array('action' => 'FilesController@post', 'files' => true)) }}
                        {{ Form::file('file') }}
                        <!--<input id="file" type="file" class="file">-->
                        {{ Form::submit('Upload') }}
                        {{ Form::token() }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link href="/thirdparty/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')
<script src="/thirdparty/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="/thirdparty/bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="/thirdparty/bootstrap-fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="/thirdparty/bootstrap-fileinput/js/fileinput.min.js"></script>

<script>
    $("#input-id").fileinput();
    $("#input-id").fileinput({'showUpload': false, 'previewFileType': 'any'});
</script>
@endpush