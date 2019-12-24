@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="header">
                        Show Cms
                        <a class="btn btn-primary btn-fill btn-sm pull-right" href="{{ route('admin.cms.index') }}"> Back</a>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <strong>Page Name:</strong>
                            {{ $cms->page_name }}
                        </div>
                        <div class="form-group">
                            <strong>Content:</strong><br><br>
                            {!! $cms->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop