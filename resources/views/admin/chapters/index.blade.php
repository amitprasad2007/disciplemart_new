@extends('layouts.master')
@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">
                        Chapters<br><br>
                        <a class="pull-right" href="{{ route('courses.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        <a class="btn btn-primary btn-fill btn-sm pull-right" href="{{ route('chapters.create',$course_id) }}"> Create</a>
                    </div>
                    <br><hr>
                    <div class="content">
                        <div class="toolbar">
                        </div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Name</th>                                  
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($chapters)
                                    @foreach($chapters as $chapter)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$chapter->name}}</td>
                                        <td>
                                            @if($chapter->is_active == 0)
                                            <a class="btn btn-danger btn-fill btn-xs" href="{{ URL::to('chapters/change-status/'.$chapter->id.'/'.$chapter->course_id) }}">Inctive</a>
                                            @else
                                            <a class="btn btn-success btn-fill btn-xs" href="{{ URL::to('chapters/change-status/'.$chapter->id.'/'.$chapter->course_id) }}">Active</a>
                                            @endif
                                            <a class="btn btn-info btn-fill btn-xs" href="{{ URL::to('chapters/'.$chapter->id.'/'.$chapter->course_id) }}">Show</a>
                                            <a class="btn btn-primary btn-fill btn-xs" href="{{ URL::to('chapters/'.$chapter->id.'/edit/'.$chapter->course_id) }}">Edit</a>                                            
                                            <a href="#" data-toggle="modal" data-target="#confirm-delete{{$chapter->id}}" class="btn btn-danger btn-fill btn-xs">Delete</a>
                                            <div class="modal fade" id="confirm-delete{{$chapter->id}}" role="dialog" style="text-align: left;">
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
                                                            {!! Form::open(['method' => 'DELETE','route' => ['chapters.destroy', $chapter->id, $chapter->course_id],'style'=>'display:inline']) !!}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop