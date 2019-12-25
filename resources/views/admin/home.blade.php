@extends('layouts.master')
@section('content')
<div class="content">
<div class="panel-body"> 
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3">
            <a href="#">
                <div class="card">
                    <div class="panel-title">
                        <h4 class="title">Total Instructor : {{$totalcount['Totalinstructor']}}</h4>
                        
                        <br>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-5">
            <a href="#">
                <div class="card">
                    <div class="panel-title">
                        <h4 class="title">Pending Instructor Approval : {{$totalcount['TotalPendingApprovalInstructor']}}</h4>
                        
                        <br>
                    </div>
                </div>
               </a>
            </div>
            <div class="col-md-4">
            <a href="#">
                <div class="card">
                    <div class="panel-title">
                        <h4 class="title">Total Members : {{$totalcount['Totalmembers']}}</h4>
                        
                        <br>
                    </div>
                </div>
             </a>
            </div>
            <div class="col-md-3">
            <a href="{{ url('courses') }}">
                <div class="card">
                    <div class="panel-title">
                        <h4 class="title">Total Courses : {{$totalcount['Totalcourses']}}</h4>
                        
                        <br>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-5">
            <a href="{{ url('courses') }}">
                <div class="card">
                    <div class="panel-title">
                        <h4 class="title">Pending Course Approval : {{$totalcount['TotalPendingApprovalCourses']}}</h4>
                        
                        <br>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-4">
            <a href="{{ route('bookings.index') }}">
                <div class="card">
                    <div class="panel-title">
                        <h4 class="title">Total Bookings : {{$totalcount['Totalbookings']}}</h4>
                        
                        <br>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="panel-title">
                        <h4 class="title">Instructors</h4>
                        <p class="category">recently joined 5 Instructors</p>
                    </div>
                    <div class="content">
                        <div class="table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($data['instructors'])
                                    @foreach($data['instructors'] as $k=>$instructor)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$instructor->name}}</td>
                                        <td>{{$instructor->email}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-link"></i> <a href="{{url('/users')}}">View all Instructor</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="panel-title">
                        <h4 class="title">Courses</h4>
                        <p class="category">recently added 5 Courses</p>
                    </div>
                    <div class="content">
                        <div class="table-full-width">
                            <table class="table">
                                <tbody>
                                    @if($data['courses'])
                                    @foreach($data['courses'] as $k=>$course)
                                    <tr>
                                        <td>
                                            <label class="checkbox">
                                                {{$k+1}}
                                            </label>
                                        </td>
                                        <td>{{$course->title}}
                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="{{ url('/courses/'.$course->id.'/edit') }}"><button type="button" rel="tooltip" title="Edit Course" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <!--<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </button>-->
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-link"></i> <a href="{{url('/coursers')}}">View all Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="panel-title">
                        <h4 class="title">Members</h4>
                        <p class="category">recently joined 5 members</p>
                    </div>
                    <div class="content">
                        <div class="table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($data['instructors'])
                                    @foreach($data['members'] as $k=>$member)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->email}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-link"></i> <a href="{{url('/users')}}">View all Members</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="panel-title">
                        <h4 class="title">Bookings</h4>
                        <p class="category">recent 5 bookings</p>
                    </div>
                    <div class="content">
                        <div class="table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Booking Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($data['bookings'])
                                    @foreach($data['bookings'] as $k=>$booking)
                                    <tr>
                                        <td>{{$booking->booking_id}}</td>
                                        <td>{{$booking->member_name}}</td>
                                        <td>{{$booking->member_email}}</td>
                                        <td>{{number_format($booking->total_amount,2)}}</td>
                                        <td>{{$booking->payment_status}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-link"></i> <a href="{{url('/bookings')}}">View all Bookings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop