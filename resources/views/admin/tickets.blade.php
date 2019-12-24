@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">Tickets</div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Ticket Id</th>
                                        <th>Member</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($tickets)
                                    @foreach($tickets as $val)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$val->ticket_id}}</td>
                                        <td>{{$val->member_name}}</td>
                                        <td>{{$val->subject}}</td>
                                        <td>{{$val->message}}</td>
                                        <td>
                                            @if($val->is_solved == 0)
                                            <a class="btn btn-danger btn-fill btn-xs" href="{{ URL::to('admin/tickets/change-status/'.$val->id) }}">Waiting</a>
                                            @else
                                            <a class="btn btn-success btn-fill btn-xs" href="{{ URL::to('admin/tickets/change-status/'.$val->id) }}">Solved</a>
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
@stop