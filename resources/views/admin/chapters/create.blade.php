@extends('layouts.master')
@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">         
            <div class="col-md-12">
                <div class="card">
                    <div class="panel-title">Add Chapter</div>
                    <div class="content">
                        {!! Form::open([ 'route' => [ 'chapters.store',$course_id ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'planner-form' ]) !!}
                            @include('admin.chapters._partials.form')
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-fill btn-info">Add</button>
                                    <a href="{{ route('chapters.index',$course_id) }}" class="btn btn-fill btn-danger">Cancel</a>
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
@stop