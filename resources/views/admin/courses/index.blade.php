@extends('layouts.master')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                  
                    <div class="content">
                     <div class="panel-body"> 
                         <div class="panel-title">Courses</div>
                <div class="row">
                    <div class="col-sm-6" style="float:right;">
                        <div class="mb-md" style="float:right;">
                            <a href="{{route('courses.create')}}" class="btn btn-primary create">Add <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>   
                        <div class="toolbar">
                        </div>
                        <div class="fresh-datatables">
						<form name="courses" id="courses" action="{{ url('/multipleaction') }}" method="post">
							{!! csrf_field() !!}
						<table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
							<tbody>
								<tr>
									<td align="left" width="250px;">
										<select name="sort_data" id="sort_data" class="select form-control">
											<option value="">Sort Data</option>
											<option value="most_viewed" <?=(isset($_REQUEST['sort_by']) && $_REQUEST['sort_by'] == 'most_viewed')?'selected="selected"':'';?>>Sort by Most Viewed</option>
										</select>
									</td>
									<td align="left" width="350px;">
										<select name="author" id="author" class="select form-control" style="width:250px; display:inline-block;">
											<option value="">Choose Author</option>
											<?php
											foreach($authors as $author):
											?>
											<option value="{{ $author->id }}">{{ $author->name }}</option>
											<?php
											endforeach;
											?>
										</select>
										<input type="submit" name="assign_to_author" id="assign_to_author" value="Assign">
									</td>
									
									<td align="right"><!--<input type="submit" name="request_approve" id="request_approve" value="Request For Approval">--><input type="submit" name="request_active" id="request_active" value="Active">&nbsp;<input type="submit" name="request_inactive" id="request_inactive" value="Inactive">&nbsp;<input type="submit" name="deleteall" id="deleteall" value="Delete"></td>
								</tr>
							</tbody>
							</table>	
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
								<thead>
                                    <tr>
                                        <th><input type="checkbox" name="selectallcourses" id="selectallcourses" value="1"></th>
                                        <th>SL No</th>
                                        <th>Created By</th>
                                        <th>Author</th>
                                        <th>Title</th>
                                        <th width="30 px">Category</th>
                                        <th>Image</th>                                        
                                        <th width="200 px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($courses)
                                    @foreach($courses as $course)
                                    <tr>
                                        <td><input type="checkbox" name="selectcourses[]" value="{{ $course->id }}"></td>
                                        <td>{{$slno}}</td>
                                        <td>{{$course->user_name}}</td>
                                        <td>{{$course->secondary_name}}</td>
                                        <td>{{$course->title}}</td>
                                        <td>{{$course->cat_name}}</td>
                                        <td>
                                            <a href="{!! asset('courses_image/'.$course->image) !!}">
                                                <img height="70px" width="70px" src="{!! asset('courses_image/'.$course->image) !!}" alt="no image" />
                                            </a>    
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-fill btn-xs" href="{{ route('chapters.index',$course->id) }}">Chapters</a>

                                            @if($course->is_active == 0)
                                            <a class="btn btn-danger btn-fill btn-xs" href="javascript:void(0)">Inactive</a>
                                            @elseif($course->is_active == 2)
                                            <a rel="tooltip" data-original-title="Click here to Approve this Course" class="btn btn-warning btn-fill btn-xs" href="{{ URL::to('courses/change-status/'.$course->id) }}">Request for Approval</a>
                                            @elseif($course->is_active == 1)
                                            <a rel="tooltip" data-original-title="Click here to inactive this Course" class="btn btn-success btn-fill btn-xs" href="{{ URL::to('courses/change-status/'.$course->id) }}">Approved</a>
                                            @endif
                                            <a class="btn btn-info btn-fill btn-xs" href="{{ route('courses.show',$course->id) }}">Show</a>
                                            <a class="btn btn-primary btn-fill btn-xs" href="{{ route('courses.edit',$course->id) }}">Edit</a>                                            
                                            <a href="#" data-toggle="modal" data-target="#confirm-delete{{$course->id}}" class="btn btn-danger btn-fill btn-xs">Delete</a>
                                            <div class="modal fade" id="confirm-delete{{$course->id}}" role="dialog" style="text-align: left;">
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
                                                            {!! Form::open(['method' => 'DELETE','route' => ['courses.destroy', $course->id],'style'=>'display:inline']) !!}
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
                            {{ $courses->links() }}
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('form#courses').submit(function()
{
	var checked_length = $('#datatables td input[type="checkbox"]:checked').length;
	if(checked_length == 0)
	{
		alert('Please select some courses first.');
		return false;
	}
	
})

$('#assign_to_author').click(function()
{
	if($('#author').val() == '')
	{
		alert('Please choose author to whom the courses will be assigned.');
		return false;
	}
})
$(function(){
	$('#sort_data').on('change',function()
	{
		window.location.href = '{{ url("/courses?sort_by=") }}'+$(this).val();
	})
})
</script>
@stop