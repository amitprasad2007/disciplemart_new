@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">Transactions</div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Booking ID</th>
                                        <th>Member</th>
                                        <th>Amount</th>
                                        <th>Payment status</th>
                                        <th>Transaction Id</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($bookings)
                                    @foreach($bookings as $val)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$val->booking_id}}</td>
                                        <td>{{$val->member_name}}</td>
                                        <td>{{'Rs. '.number_format($val->total_amount,2)}}</td>
                                        <td>
                                            @if($val->payment_status == 'success')
                                                <a class="btn btn-success btn-fill btn-xs">Success</a>
                                            @elseif($val->payment_status == 'failure')    
                                                <a class="btn btn-danger btn-fill btn-xs">Failure</a>
                                            @else($val->payment_status == '')  
                                                <a class="btn btn-warning btn-fill btn-xs">Waiting</a>
                                            @endif    
                                        </td>
                                         <td>{{$val->txnid}}</td>
                                    </tr>
                                    <?php $slno = $slno + 1; ?>    
                                    @endforeach
                                    @endif
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