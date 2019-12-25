@extends('layouts.master')

@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card"> 
                    <div class="panel-title">
                        Booking Details
                        <a class="pull-right" onclick="window.close();"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <strong>Booking ID:</strong>
                            {{ $booking->booking_id }}
                        </div>
                        <div class="form-group">
                            <strong>Member name:</strong>
                            {{ $booking->member_name }}
                        </div>
                        <div class="form-group">
                            <strong>Member email:</strong>
                            {{ $booking->member_email }}
                        </div>
                        <div class="form-group">
                            <strong>Member phone:</strong>
                            {{ $booking->member_phone }}
                        </div>
                        <div class="form-group">
                            <strong>Shipping address:</strong>
                            {{ $booking->member_address }}
                        </div>
                        <div class="form-group">
                            <strong>Shipping country:</strong>
                            {{ $booking->member_country }}
                        </div>
                        <div class="form-group">
                            <strong>Shipping state:</strong>
                            {{ $booking->member_state }}
                        </div>
                        <div class="form-group">
                            <strong>Shipping city:</strong>
                            {{ $booking->member_city }}
                        </div>
                        <div class="form-group">
                            <strong>Shipping zipcode:</strong>
                            {{ $booking->member_zipcode }}
                        </div>
                        <div class="form-group">
                            <strong>Billing address:</strong>
                            {{ $booking->billing_address }}
                        </div>
                        <div class="form-group">
                            <strong>Billing country:</strong>
                            {{ $booking->billing_country }}
                        </div>
                        <div class="form-group">
                            <strong>Billing state:</strong>
                            {{ $booking->billing_state }}
                        </div>
                        <div class="form-group">
                            <strong>Billing city:</strong>
                            {{ $booking->billing_city }}
                        </div>
                        <div class="form-group">
                            <strong>Billing zipcode:</strong>
                            {{ $booking->billing_zipcode }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $booking->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Coupon code:</strong>
                            {{ $booking->coupon_code }}
                        </div>
                        <div class="form-group">
                            <strong>Coupon discount amount:</strong>
                            {{ $booking->coupon_discount_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Total amount:</strong>
                            {{ $booking->total_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Payment status:</strong>
                            @if($booking->payment_status == 'success')
                                <a class="btn btn-success btn-fill btn-xs">Success</a>
                            @elseif($booking->payment_status == 'failure')    
                                <a class="btn btn-danger btn-fill btn-xs">Failure</a>
                            @else($booking->payment_status == '')  
                                <a class="btn btn-warning btn-fill btn-xs">Waiting</a>
                            @endif   
                        </div>
                        @if($booking->payment_status == 'success')
                        <div class="form-group">
                            <strong>Txnid:</strong>
                            {{ $booking->txnid }}
                        </div>
                        <div class="form-group">
                            <strong>Is Delivered:</strong>
                            @if($booking->is_delivered == 2)
                            <a class="btn btn-success btn-fill btn-xs">Delivered</a>
                            @elseif($booking->is_delivered == 1)
                            <a class="btn btn-info btn-fill btn-xs">Courier Added</a>
                            @elseif($booking->is_delivered == 0)
                            <a class="btn btn-danger btn-fill btn-xs">Waiting for Courier</a>
                            @endif
                        </div>
                        <div class="form-group">
                            <strong>Courier details:</strong>
                            {{ $booking->courier_details }}
                        </div>
                        @endif
                        <div class="form-group">
                            <strong>Created at:</strong>
                            {{ date('d-M-Y h:i A',strtotime($booking->created_at)) }}
                        </div>
                        <h4>Course details</h4>
                        <table class="table">
                            <thead>
                                <tr class="warning">
                                    <th>Course Id</th>
                                    <th>Course Name</th>
                                    <th>Course Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booking->courses as $course)
                                <tr class="info">
                                    <td>#{{ $course->course_id }}</td>
                                    <td><a target="_blank" href="{{url('courses/'.$course->course_id)}}">{{ $course->course_name }}</a></td>
                                    <td>Rs. {{ number_format($course->course_price,2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection