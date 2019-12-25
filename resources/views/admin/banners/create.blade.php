@extends('layouts.master')

@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">         
            <div class="col-md-12">
                <div class="card">
                    <div class="panel-title">Add Banner</div>
                    <div class="content">
                        {!! Form::open([ 'route' => [ 'banners.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'planner-form' ]) !!}
                         <div class="form-group">
    <label class="col-sm-3 control-label"> Banner Name </label>
    <div class="col-sm-6">        
        {!! Form::text('title',null, array( 'placeholder' => 'Banner Title', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Banner Details </label>
    <div class="col-sm-6">        
        {!! Form::textarea('description',null, array('placeholder' => 'Banner Details', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Banner Link </label>
    <div class="col-sm-6">        
        {!! Form::text('link',null, array( 'placeholder' => 'Banner Link', 'class' => 'form-control'))  !!}
    </div>
</div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> Banner Image </label>
                                <div class="fileupload fileupload-new col-sm-9" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 160px; height: 80px;"><img src="" alt="" /></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: auto; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-file btn-primary btn-fill btn-sm"><span class="fileupload-new">Select new image</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input required="required" type="file" class="" name="image" >
                                        </span>
                                        <a href="#" class="btn btn-danger btn-fill btn-sm fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-fill btn-info">Add</button>
                                    <a href="{{ route('banners.index') }}" class="btn btn-fill btn-danger">Cancel</a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
</div>

@endsection