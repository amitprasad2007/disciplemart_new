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
                    <div class="col-md-12 panel-title">Edit advertisement</div>
                    <div class="content">
                        {!! Form::Model($advertisement,array('route'=> array('advertisements.update',$advertisement->id),'method'=>'PATCH','class'=>'form-horizontal','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'planner-form')) !!}
                          <div class="form-group">
    <label class="col-sm-3 control-label"> Advertisement Name </label>
    <div class="col-sm-6">        
        {!! Form::text('title',null, array('required' => 'required', 'placeholder' => 'Advertisement Title', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Advertisement Details </label>
    <div class="col-sm-6">        
        {!! Form::textarea('description',null, array('required' => 'required', 'placeholder' => 'Advertisement Details', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Advertisement Link </label>
    <div class="col-sm-6">        
        {!! Form::text('link',null, array('required' => 'required', 'placeholder' => 'Advertisement Link', 'class' => 'form-control'))  !!}
    </div>
</div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right"> Advertisement Image </label>
                                <div class="fileupload fileupload-new col-sm-9" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 160px; height: 80px;"><img src="{!! asset('advertisements_image/'.$advertisement->image) !!}" alt="" /></div>
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
                                    <button type="submit" class="btn btn-fill btn-info btn-fill btn-fill">Update</button>
                                    <a href="{{ route('advertisements.index') }}" class="btn btn-fill btn-danger">Cancel</a>
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