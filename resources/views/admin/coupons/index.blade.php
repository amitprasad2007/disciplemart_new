@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">Coupons</div>
                    <div class="content">
                        <div class="toolbar">
                             <div class="col-sm-6" style="float:right;">
                        <div class="mb-md" style="float:right;">
                            <a href="{{route('coupons.create')}}" class="btn btn-primary create">Add <i class="fa fa-plus"></i></a>
                        </div>
                        </div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Coupon</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <!--<th>Discount Type</th>-->
                                        <th>Discount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($coupons)
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->validity_start_date}}</td>
                                        <td>{{$coupon->validity_end_date}}</td>
                                        <!--<td>
                                            @if($coupon->discount_type == 1)
                                                {{'Flat'}}
                                            @else
                                                {{'Percentage'}}
                                            @endif
                                        </td>-->
                                        <td>
                                            @if($coupon->discount_type == 1)
                                                {{'Rs. '.number_format($coupon->discount,2)}}
                                            @else
                                                {{$coupon->discount.' %'}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($coupon->is_active == 0)
                                            <a class="btn btn-danger btn-fill btn-xs" href="{{ URL::to('coupons/change-status/'.$coupon->id) }}">Inctive</a>
                                            @else
                                            <a class="btn btn-success btn-fill btn-xs" href="{{ URL::to('coupons/change-status/'.$coupon->id) }}">Active</a>
                                            @endif
                                            <a class="btn btn-info btn-fill btn-xs" href="{{ route('coupons.show',$coupon->id) }}">Show</a>
                                            <a class="btn btn-primary btn-fill btn-xs" href="{{ route('coupons.edit',$coupon->id) }}">Edit</a>                                            
                                            <a href="#" data-toggle="modal" data-target="#confirm-delete{{$coupon->id}}" class="btn btn-danger btn-fill btn-xs">Delete</a>
                                            <div class="modal fade" id="confirm-delete{{$coupon->id}}" role="dialog" style="text-align: left;">
                                                <div class="modal-dialog" style="width: 35%;">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Confirm Delete</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>You are about to delete <b><i class="title"></i></b> record, this procedure is irreversible.</p>
                                                            <p>Do you want to proceed?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(['method' => 'DELETE','route' => ['coupons.destroy', $coupon->id],'style'=>'display:inline']) !!}
                                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-fill btn-sm']) !!}
                                                            <button type="button" class="btn btn-default btn-fill btn-sm" data-dismiss="modal">Cancel</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $slno = $slno + 1; ?>    
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{ $coupons->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection