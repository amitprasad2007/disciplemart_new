@extends('layouts.master')
@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">Bookings</div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
						<div id="baseDateControl">
							<div class="dateControlBlock">
								Between <input type="text" name="dateStart" id="dateStart" class="datepickers" value="01/01/1950" size="8" readonly /> and 
								<input type="text" name="dateEnd" id="dateEnd" class="datepickers" value="{{ date('m/d/Y') }}" size="8" readonly />
							</div>
						</div>
                            <table id="bookingdatatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Booking ID</th>
                                        <th>Member</th>
                                        <th>Email</th>
										<th>Date</th>
                                        <th>Amount</th>
                                        <th>Payment status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($bookings)
                                    @foreach($bookings as $val)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#bookingDetails{{$val->id}}">
                                                {{$val->booking_id}}
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="bookingDetails{{$val->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header info">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Booking ID : #{{$val->booking_id}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Course details....</p>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr class="warning">
                                                                        <th>Course Id</th>
                                                                        <th>Course Name</th>
                                                                        <th>Course Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($val->courses as $course)
                                                                    <tr class="info">
                                                                        <td>#{{ $course->course_id }}</td>
                                                                        <td>{{ substr($course->course_name,0,50).'...' }}<a target="_blank" href="{{url('courses/'.$course->course_id)}}">View</a></td>
                                                                        <td>Rs. {{ number_format($course->course_price,2) }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$val->member_name}}</td>
                                        <td>{{$val->member_email}}</td>
										<td>{{date('d-M-Y h:i A',strtotime($val->created_at))}}</td>
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
                                        <td>
                                            <a class="btn btn-info btn-fill btn-xs" target="_blank" href="{{ route('bookings.show',$val->id) }}">Show</a>
											@if($val->is_delivered == 0)
                                            <a class="btn btn-success btn-fill btn-xs" target="_blank" href="{{ url('/invoices/'.$val->booking_id.'.pdf') }}">Inovice</a>
                                            @endif
                                            @if($val->payment_status == 'success')
                                                @if($val->is_delivered == 0)
											    <a title='Add Courier Details' class="btn btn-danger btn-fill btn-xs" data-toggle="modal" data-target="#courierDetails{{$val->id}}">Add Courier</a>
											<div class="modal fade" id="courierDetails{{$val->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header info">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Booking ID : #{{$val->booking_id}}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                {!! Form::Model($val,['method' => 'PATCH','route' => ['bookings.update', $val->id]]) !!}
                                                                    <p>Add Courier Details</p>
                                                                    <input type="hidden" name="is_delivered" value="1" />
																	<div class="form-group">
                                                                        <input type="text" required name="courier_name" class="form-control" placeholder="Courier Name">  
                                                                    </div>
																	<div class="form-group">
                                                                        <input type="text" required name="pod_no" class="form-control" placeholder="POD Number">  
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <textarea required name="courier_details" class="form-control" placeholder="e.g. Tracking ID, Link etc." rows="3" cols="50"></textarea>  
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input onclick="return confirm('Are you sure? Once you submit the data it cannot be edited.');" type="submit" value="Submit" class="btn btn-primary btn-fill btn-sm" />
                                                                    </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @elseif($val->is_delivered == 1)
                                                <a title='Add Courier Details' class="btn btn-primary btn-fill btn-xs" data-toggle="modal" data-target="#courierDetails{{$val->id}}">Courier Added</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="courierDetails{{$val->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header info">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Booking ID : #{{$val->booking_id}}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>View Courier Details</p>
                                                                <div class="form-group">
                                                                    <label>Courier Name : </label>
																	{{ $val->courier_name }}  
                                                                </div>
																<div class="clearfix"></div>
																<div class="form-group">
                                                                    <label>POD No : </label>
																	{{ $val->pod_no }}  
                                                                </div>
																<div class="clearfix"></div>
																<div class="form-group">
                                                                    <label>Courier Details : </label>
																	{{ $val->courier_details }}  
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @elseif($val->is_delivered == 2)
                                                <a class="btn btn-success btn-fill btn-xs">Delivered</a>
                                                @endif
                                            @endif
                                        </td>
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
</div>
@endsection