<div class="form-group">
    <label class="col-sm-3 control-label"> Chapter Name </label>
    <div class="col-sm-6">        
        {!! Form::text('name',null, array('required' => 'required', 'placeholder' => 'Chapter Title', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Chapter description </label>
    <div class="col-sm-9">        
        {!! Form::textarea('description',null, array('required' => 'required', 'placeholder' => 'Chapter Overview', 'class' => 'form-control ckeditor'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Chapter video </label>
    <div class="col-sm-6">        
        <input type="file" name="video" class="form-control" style="padding: 1px;" />
    </div>
</div>