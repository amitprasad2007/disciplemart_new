<?php
use \App\Http\Controllers\CoursesController;

$coursescontroller = new CoursesController();
?>
@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">         
            <div class="col-md-10">
                <div class="card">
                    <div class="panel-title">Edit course</div>
                    <div class="content">
                        {!! Form::Model($course,array('route'=> array('courses.update',$course->id),'method'=>'PATCH','class'=>'form-horizontal','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'planner-form')) !!}
                            @include('admin.courses._partials.form')
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> Course Image </label>
                                <div class="fileupload fileupload-new col-sm-9" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 160px; height: 80px;"><img src="{!! asset('courses_image/'.$course->image) !!}" alt="" /></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 120px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-file btn-primary btn-fill btn-sm"><span class="fileupload-new">Select new image</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" name="image" >
                                        </span>
                                        <a href="#" class="btn btn-danger btn-fill btn-sm fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-fill btn-info btn-fill btn-fill" value="Update">
                                    <a href="{{ route('courses.index') }}" class="btn btn-fill btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
@stop