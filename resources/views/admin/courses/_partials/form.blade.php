<div class="form-group">
    <label class="col-sm-3 control-label"> Category </label>
    <div class="col-sm-6">    
<select name="category_id" class="form-control selectpicker" required="required">
<option value="0">Select Category</option>
@foreach($categories as $cat)
		<?php
			$sub_cats = $coursescontroller->category_drop_down($cat['id']);	
		?>
		<option value="{{ $cat['id'] }}" <?php if(isset($course) && $course->category_id == $cat['id']) { echo 'selected'; } ?>>{{ $cat['name'] }}</option>
		@if(count($sub_cats)>0)
			@foreach($sub_cats as $sub_cat)
		<?php
			$sub_sub_cats = $coursescontroller->category_drop_down($sub_cat['id']);	
		?>
				<option value="{{ $sub_cat['id'] }}" <?php if(isset($course) && $course->category_id == $sub_cat['id']) { echo 'selected'; } ?>>---{{ $sub_cat['name'] }}</option>
				
				@if(count($sub_sub_cats)>0)
					@foreach($sub_sub_cats as $sub_sub_cat)
						<option value="{{ $sub_sub_cat['id'] }}" <?php if(isset($course) && $course->category_id == $cat['id']) { echo 'selected'; } ?>>------{{ $sub_sub_cat['name'] }}</option>
					@endforeach;
				@endif;
			@endforeach;
		@endif;	
	
@endforeach;
</select>    
        
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label"> Course Name </label>
    <div class="col-sm-6">        
        {!! Form::text('title',null, array('required' => 'required', 'placeholder' => 'Course Title', 'class' => 'form-control'))  !!}
    </div>
</div>
<!--<div class="form-group">
    <label class="col-sm-3 control-label"> Primary Author </label>
    <div class="col-sm-6">        
        {!! Form::select('user_id',$authors,null, array('required' => 'required', 'class' => 'form-control selectpicker', 'id' => 'user_id'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Secondary Author </label>
    <div class="col-sm-6">        
        {!! Form::select('secondary_user_id',$authors,null, array('class' => 'form-control selectpicker', 'id' => 'secondary_user_id'))  !!}
    </div>
</div>-->
<div class="form-group">
    <label class="col-sm-3 control-label"> Course Overview </label>
    <div class="col-sm-9">        
        {!! Form::textarea('overview',null, array('required' => 'required', 'placeholder' => 'Course Overview', 'class' => 'form-control ckeditor'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course Curriculum </label>
    <div class="col-sm-9">        
        {!! Form::textarea('curriculum',null, array('required' => 'required', 'placeholder' => 'Course Curriculum', 'class' => 'form-control ckeditor'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course prerequisites </label>
    <div class="col-sm-9">        
        {!! Form::textarea('prerequisites',null, array('required' => 'required', 'placeholder' => 'Course prerequisites', 'class' => 'form-control ckeditor'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course summary </label>
    <div class="col-sm-9">        
        {!! Form::textarea('summary',null, array('required' => 'required', 'placeholder' => 'Course summary', 'class' => 'form-control ckeditor'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course duration </label>
    <div class="col-sm-6">        
        {!! Form::text('duration',null, array('required' => 'required', 'placeholder' => 'Course duration', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course modules </label>
    <div class="col-sm-6">        
        {!! Form::number('modules',null, array('required' => 'required', 'placeholder' => 'Course modules', 'class' => 'form-control'))  !!}
    </div>
</div>
<?php $language = array('1' => 'English', '2' => 'Hindi', '3' => 'Bengali') ?>
<div class="form-group">
    <label class="col-sm-3 control-label"> Language </label>
    <div class="col-sm-6">        
        {!! Form::select('language',$language,null, array('required' => 'required', 'placeholder' => 'Language', 'class' => 'form-control selectpicker'))  !!}
    </div>
</div>
<?php $delivery_medium = array( '1' => 'Pen Drive', '2' => 'Online') ?>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course delivery medium </label>
    <div class="col-sm-6">        
        {!! Form::select('delivery_medium', $delivery_medium, null, array('required' => 'required', 'placeholder' => 'Course delivery medium', 'class' => 'form-control selectpicker'))  !!}
    </div>
</div>
<?php $level = array('' => 'Select course level', '1' => 'Beginners/Foundation', '2' => 'Intermediate', '3' => 'Advanced/Final') ?>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course level </label>
    <div class="col-sm-6">        
        {!! Form::select('level', $level, null, array('required' => 'required', 'placeholder' => 'Course level', 'class' => 'form-control selectpicker'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course validity </label>
    <div class="col-sm-6">        
        {!! Form::text('validity',null, array('required' => 'required', 'placeholder' => 'Course validity', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course Price </label>
    <div class="col-sm-3">        
        {!! Form::number('price',null, array('required' => 'required', 'placeholder' => 'Course Price', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Course Offered Price </label>
    <div class="col-sm-3">        
        {!! Form::number('offered_price',null, array('required' => 'required', 'placeholder' => 'Course Offered Price', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Is Demand Course </label>
    <div class="col-sm-6">        
        <label class="radio">
            {{ Form::radio('is_demand', '1', null, array('data-toggle' => 'radio')) }}Yes
        </label>
        <label class="radio">
            {{ Form::radio('is_demand', '0', null, array('data-toggle' => 'radio')) }}No
        </label>
    </div>
</div>
<!--<div class="form-group">
    <label class="col-sm-3 control-label"> Course demo video title </label>
    <div class="col-sm-6">        
        {!! Form::text('demo_video_title',null, array('required' => 'required', 'placeholder' => 'Course demo video title', 'class' => 'form-control'))  !!}
    </div>
</div>-->
<div class="form-group">
    <label class="col-sm-3 control-label"> Course demo video links </label>
    <div class="col-sm-6">        
        {!! Form::text('demo_video_links',null, array('required' => 'required', 'placeholder' => 'Course demo video links', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Number of use per lecture </label>
    <div class="col-sm-6">        
        {!! Form::text('number_of_use_per_lecture',null, array( 'placeholder' => 'Number of use per lecture', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Number of lectures </label>
    <div class="col-sm-6">        
        {!! Form::text('number_of_lectures',null, array( 'placeholder' => 'Number of lectures', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Videotime / lecture </label>
    <div class="col-sm-6">        
        {!! Form::text('videotime_or_lecture',null, array( 'placeholder' => 'Videotime / lecture', 'class' => 'form-control'))  !!}
    </div>
</div>
<!--<div class="form-group">
    <label class="col-sm-3 control-label"> Number of Modules </label>
    <div class="col-sm-6">        
        {!! Form::text('number_of_modules',null, array( 'placeholder' => 'Number of Modules', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Number of module </label>
    <div class="col-sm-6">        
        {!! Form::text('number_of_module',null, array( 'placeholder' => 'Number of module', 'class' => 'form-control'))  !!}
    </div>
</div>-->
<div class="form-group">
    <label class="col-sm-3 control-label"> Content Medium </label>
    <div class="col-sm-6">        
        {!! Form::text('content_medium',null, array( 'placeholder' => 'Content Medium', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Study Material Sample </label>
	<div class="col-sm-6 study_material">
	<?php
	if(isset($course->id))
	{
		$study_material_sample = json_decode($course->study_material_sample);
		
		if($study_material_sample)
		{
		for($i=0;$i<count($study_material_sample);$i++)
		{
	?>
		   <div class="otherfiles">
			{!! Form::file('study_material_sample[]', [ 'placeholder' => 'Study material sample', 'class' => 'form-control'])  !!}
			
			{!! Form::hidden('study_material_demo_sample[]',  $study_material_sample[$i] ,[ 'class' => 'form-control'])  !!}
			
				{{ $study_material_sample[$i] }}
				
			@if($i != 0)
				<span class="remove">x</span>
		    @endif
			</div>
	<?php		
		}
		}
		else
		{
		?>
		{!! Form::file('study_material_sample[]', [ 'placeholder' => 'Study material sample', 'class' => 'form-control'])  !!}
	<?php		
		}
	}
	else
	{
	?>
		{!! Form::file('study_material_sample[]', [ 'placeholder' => 'Study material sample', 'class' => 'form-control'])  !!}
	<?php	
	}
	?>
    </div>
	<div class="clearfix"></div>
	<div class="add_more col-sm-6 col-sm-offset-3">
		<button type="button" class="btn button" id="add_more">+ Add More</button>
	</div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Certification for course </label>
    <div class="col-sm-6">        
        {!! Form::text('certification_for_course',null, array( 'placeholder' => 'Certification for course', 'class' => 'form-control'))  !!}
    </div>
</div>
<script>
$('#parent_category').on('change',function(){
	if($(this).val() != '')
	{
		$.ajax({
			'url':'{{ url("/admin/courses/fetchSubCategory") }}',
			'method': 'post',
			'data': {'cat_id':$(this).val(),'_token':'{{ csrf_token() }}'},
			'success': function(e){
				//alert(e);
				if(e != '')
				{
					$('#sub_category_id').append(e);
					
					$('.sub-cat').show();
				}
				else
				{
					$('#sub_category_id').html('<option selected="selected" value="">Sub Category</option>');
					
					$('.sub-cat').hide();
				}
			}
		})
	}
	else
	{
		$('#sub_category_id').html('<option selected="selected" value="">Sub Category</option>');
					
					$('.sub-cat').hide();
	}	
})

$(function(){
	$('#add_more').click(function(){
		$('.study_material').append('<div class="otherfiles"><input type="file" name="study_material_sample[]" class="form-control" placeholder="Study material sample"><span class="remove">x</span></div>');
		
		$('span.remove').click(function()
		{
			$(this).parent().remove();
		})
	})
	
	
})
</script>