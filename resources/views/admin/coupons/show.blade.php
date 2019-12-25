@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">
                        Show Coupon
                        <a class=" pull-right" href="{{ route('coupons.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <strong>Coupon:</strong>
                            {{$coupon->code}}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{$coupon->validity_start_date}}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{$coupon->validity_end_date}}
                        </div>
                        <div class="form-group">
                            <strong>Discount:</strong>
                            @if($coupon->discount_type == 1)
                                {{'Rs. '.number_format($coupon->discount,2)}}
                            @else
                                {{$coupon->discount.' %'}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection