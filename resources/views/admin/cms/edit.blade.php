@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">         
            <div class="col-md-10">
                <div class="card">
                    <div class="header">Edit Cms</div>
                    <div class="content">
                        {!! Form::Model($cms,array('route'=> array('admin.cms.update',$cms->id),'method'=>'PATCH','class'=>'form-horizontal','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'planner-form')) !!}
                            @include('admin.cms._partials.form')                            
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-fill btn-info">Submit</button>
                                    <a href="{{ route('admin.cms.index') }}" class="btn btn-fill btn-danger">Cancel</a>
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