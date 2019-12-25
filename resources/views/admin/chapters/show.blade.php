@extends('layouts.master')

@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">
                        Show Chapter
                        <a class=" pull-right" href="{{ route('chapters.index',$course_id) }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{$chapter->name}}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {!!$chapter->description!!}
                        </div>
                        <div class="form-group">
                            <video width="350" controls>
                                <source src="{!! asset('chapters_video/'.$chapter->video) !!}" type="video/mp4">
                                <source src="{!! asset('chapters_video/'.$chapter->video) !!}" type="video/ogg">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop