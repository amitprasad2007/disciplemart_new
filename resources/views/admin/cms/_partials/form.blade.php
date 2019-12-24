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