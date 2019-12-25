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
            <div class="col-md-10">
                <div class="card">
                <div class="col-md-12 panel-title">Add Cms</div>
                    <div class="content">
                        {!! Form::open(array('route'=>'cms.store','class'=>'form-horizontal','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'planner-form')) !!}
                        <div class="form-group">
    <label class="col-sm-3 control-label"> Page Name </label>
    <div class="col-sm-6">        
        {!! Form::text('page_name',null, array('required' => 'required', 'placeholder' => 'Page Name', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Content </label>
    <div class="col-sm-9">        
        {!! Form::textarea('content',null, array('required' => 'required', 'placeholder' => 'Content', 'class' => 'form-control ckeditor'))  !!}
    </div>
</div>
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-fill btn-info">Submit</button>
                                    <a href="{{ route('cms.index') }}" class="btn btn-fill btn-danger">Cancel</a>
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
</section>
          
@endsection