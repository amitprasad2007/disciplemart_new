@extends('layouts.master')

@section('content')
<section class="panel">
   <header class="panel-heading">
      <div class="panel-actions">
      </div>
   </header>
   <div class="panel-body">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                <div class="col-md-12 panel-title">
                        Show Cms
                        <a class="btn btn-primary btn-fill btn-sm pull-right" href="{{ route('cms.index') }}"> Back</a>
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
</div>
</section>
          
@endsection