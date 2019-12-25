@extends('layouts.master')
@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                    <div class="header">
                        <h4 class="title">Settings</h4>
                    </div>
                    <div class="content">
                        {!! Form::model($settings, ['method' => 'PATCH', 'enctype' => 'multipart/form-data', 'route' => ['admin.settings']]) !!}    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Site Name</label>
                                    <input type="text" name="site_name" class="form-control" placeholder="Site Name" value="{{ $settings->site_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Site Email</label>
                                    <input type="text" name="site_email" class="form-control" placeholder="Site Email" value="{{ $settings->site_email }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Site Phone Number</label>
                                    <input type="text" name="site_phone_number" class="form-control" placeholder="Site Phone Number" value="{{ $settings->site_phone_number }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-md-4">
                                <div class="form-group">
                                    <label>GST(%)</label>
                                    <input type="text" name="gst" class="form-control" placeholder="GST" value="{{ $settings->gst }}">
                                </div>
                            </div>
							<div class="col-md-4">
                                <div class="form-group">
                                    <label>GSTIN</label>
                                    <input type="text" name="gstin" class="form-control" placeholder="GSTIN" value="{{ $settings->gstin }}">
                                </div>
                            </div>
							<div class="col-md-4">
                                <div class="form-group">
                                    <label>PAN No</label>
                                    <input type="text" name="pan_no" class="form-control" placeholder="PAN No" value="{{ $settings->pan_no }}">
                                </div>
                            </div>
							<div class="col-md-4">
                                <div class="form-group">
                                    <label>HSN/SAC Code</label>
                                    <input type="text" name="hsn_sac_code" class="form-control" placeholder="HSN/SAC Code" value="{{ $settings->hsn_sac_code }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Site Logo</label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 160px; height: 80px;"><img src="{!! asset('sitesettings/'.$settings->site_logo) !!}" alt="" /></div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: auto; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-file btn-primary btn-fill btn-sm"><span class="fileupload-new">Select new image</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" class="" name="site_logo" >
                                            </span>
                                            <a href="#" class="btn btn-danger btn-fill btn-sm fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Site Fav Icon</label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 160px; height: 80px;"><img src="{!! asset('sitesettings/'.$settings->site_favicon) !!}" alt="" /></div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: auto; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-file btn-primary btn-fill btn-sm"><span class="fileupload-new">Select new image</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" class="" name="site_favicon" >
                                            </span>
                                            <a href="#" class="btn btn-danger btn-fill btn-sm fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Settings</button>
                        <div class="clearfix"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop