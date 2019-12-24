@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">         
           <div class="col-md-12 panel-title">
            Add Coupon                    
            <a class="btn btn-primary btn-fill btn-sm pull-right" href="{{ route('coupons.index') }}"> Back</a></div>

            <div class="col-md-8">
              <div class="card">
                   
                    <div class="content">
                        {!! Form::open([ 'route' => [ 'coupons.store' ], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'planner-form' ]) !!}
        <div class="form-group">
    <label class="col-sm-3 control-label"> Single / Bulk </label>
    <div class="col-sm-6">        
        <select name="number_of_code" id="number_of_code" class="form-control" required>
			<option value="">Choose</option>
			<option value="single">Single</option>
			<option value="bulk">Bulk</option>
		</select>
    </div>
	
</div>
<div class="form-group single_code" style="display:none;">
    <label class="col-sm-3 control-label"> Coupon Code </label>
    <div class="col-sm-6">        
        {!! Form::text('code',null, array('placeholder' => 'Coupon Code', 'class' => 'form-control',  'id' => 'code'))  !!}
    </div>
	@if(!isset($coupon->id))
	<div class="col-sm-1"><button class="btn btn-primary" type="button" onclick="createCouponcode()">Create</button></div>
	@endif
</div>
<div class="form-group bulk_codes" style="display:none;">
    <label class="col-sm-3 control-label"> Number of Coupon Codes </label>
    <div class="col-sm-6">        
        {!! Form::number('number_of_codes',null, array('placeholder' => 'Number of Coupon Codes', 'class' => 'form-control', 'id' => 'number_of_codes', 'min' => '1', 'max'=> '200'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Validity Start Date </label>
    <div class="col-sm-6">        
        {!! Form::text('validity_start_date',null, array('required' => 'required', 'placeholder' => 'Validity Start Date', 'class' => 'form-control datepicker1'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Validity End Date </label>
    <div class="col-sm-6">        
        {!! Form::text('validity_end_date',null, array('required' => 'required', 'placeholder' => 'Validity End Date', 'class' => 'form-control datepicker2'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Discount Type </label>
    <div class="col-sm-6">        
        <label class="radio">
            <!--<span class="icons">
                <span class="first-icon fa fa-circle-o"></span>
                <span class="second-icon fa fa-dot-circle-o"></span>                    
            </span>-->
            {{ Form::radio('discount_type', '1', null, array('data-toggle' => 'radio')) }}Flat
        </label>
        <label class="radio">
            <!--<span class="icons">
                <span class="first-icon fa fa-circle-o"></span>
                <span class="second-icon fa fa-dot-circle-o"></span>                    
            </span>-->
            {{ Form::radio('discount_type', '2', null, array('data-toggle' => 'radio')) }}Percentage
        </label>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Discount </label>
    <div class="col-sm-6">        
        {!! Form::number('discount',null, array('required' => 'required', 'placeholder' => 'Discount', 'class' => 'form-control'))  !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"> Message </label>
    <div class="col-sm-9">        
        {!! Form::textarea('message',null, array('placeholder' => 'Message', 'class' => 'form-control'))  !!}
    </div>
</div>
<script>
$(function(){
	
	$('#number_of_code').on('change',function()
	{
		if($(this).val() == 'single')
		{
			$('.single_code').show();
			$('.bulk_codes').hide();
			$('#code').attr('required','required');
			$('#number_of_codes').removeAttr('required');
		}
		else if($(this).val() == 'bulk')
		{
			$('.bulk_codes').show();
			$('.single_code').hide();
			$('#number_of_codes').attr('required','required');
			$('#code').removeAttr('required');
		}
		else
		{
			$('.single_code').hide();
			$('.bulk_codes').hide();
			$('#code').removeAttr('required');
		}
	})
})
function createCouponcode()
{
	var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var coupon = "";
    for (var x = 0; x < 6; x++) {
        var i = Math.floor(Math.random() * chars.length);
        coupon += chars.charAt(i);
    }
    return $('#code').val(coupon);
}
</script>                    


                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-fill btn-info">Add</button>
                                    <a href="{{ route('coupons.index') }}" class="btn btn-fill btn-danger">Cancel</a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>

@endsection