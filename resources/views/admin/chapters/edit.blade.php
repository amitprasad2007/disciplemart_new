@extends('layouts.master')
@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">         
            <div class="col-md-10">
                <div class="card">
                    <div class="panel-title">Edit chapter</div>
                    <div class="content">
                        {!! Form::Model($chapter,array('route'=> array('chapters.update',$chapter->id,$course_id),'method'=>'PATCH','class'=>'form-horizontal','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'planner-form')) !!}
                            @include('admin.chapters._partials.form')
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-fill btn-info btn-fill btn-fill">Update</button>
                                    <a href="{{ route('chapters.index',$course_id) }}" class="btn btn-fill btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
</div>
@stop