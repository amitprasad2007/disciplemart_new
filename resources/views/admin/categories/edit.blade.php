@extends('layouts.Master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">         
            <div class="col-md-10">
                <div class="card">
                    <div class="panel-title">Edit Category</div>
                    <div class="content">
                        {!! Form::Model($category,array('route'=> array('categories.update',$category->id),'method'=>'PUT','class'=>'form-horizontal','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'planner-form')) !!}
                            <div class="form-group">
    <label class="col-sm-3 control-label"> Category Name </label>
    <div class="col-sm-6">        
        {!! Form::text('name',null, array('required' => 'required', 'placeholder' => 'Category Name', 'class' => 'form-control'))  !!}
    </div>
</div>
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-fill btn-info">Submit</button>
                                    <a href="{{ route('categories') }}" class="btn btn-fill btn-danger">Cancel</a>
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