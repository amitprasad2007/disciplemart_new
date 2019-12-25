@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">
                        Show Course
                        <a class=" pull-right" href="{{ route('courses.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{$course->title}}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{$course->user_name}} ({{$course->role_name}})
                        </div>
                        <div class="form-group">
                            <strong>Overview :</strong>
                            {!!$course->overview!!}
                        </div>
                        <div class="form-group">
                            <strong>Curriculum :</strong>
                            {!!$course->curriculum!!}
                        </div>
                        <div class="form-group">
                            <strong>Prerequisites :</strong>
                            {!!$course->prerequisites!!}
                        </div>
                        <div class="form-group">
                            <strong>Summary :</strong>
                            {!!$course->summary!!}
                        </div>
                        <div class="form-group">
                            <strong>Duration :</strong>
                            {{$course->duration }}
                        </div>
                        <div class="form-group">
                            <strong>Delivery medium :</strong>
                            {{$course->delivery_medium }}
                        </div>
                        <div class="form-group">
                            <strong>Level :</strong>
                            {{$course->level }}
                        </div>
                        <div class="form-group">
                            <strong>Validity :</strong>
                            {{$course->validity }}
                        </div>
                        <div class="form-group">
                            <strong>Demo video title :</strong>
                            {{$course->demo_video_title }}
                        </div>
                        <div class="form-group">
                            <strong>Demo video links:</strong>
                            <a target="_blank" href="{{$course->demo_video_links}}">{{$course->demo_video_links}}</a>
                        </div>
                        <div class="form-group">
                            <a href="{!! asset('courses_image/'.$course->image) !!}">
                                <img height="100px" width="100px" src="{!! asset('courses_image/'.$course->image) !!}" alt="no image" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop