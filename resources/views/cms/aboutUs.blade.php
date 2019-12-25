@extends('layouts.main')

@section('content')

<div class="clearAll"></div>

<div class="courseDAreaHead cms">
    <div class="container">
        <h3>{{$cms->page_name}}</h3>
    </div>
</div>

<!-- <div class="courseListArea">
    <div class="container">
        <h2>{{$cms->page_name}}</h2>
        <p>Aenean sodales nibh eget ves ti bulum venenatis. Sed fringilla leo erat. Praesent sed scelerisque.</p>
    </div>
</div> -->

<div class="clearfix"></div>
<div class="spacer50"></div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            {!!$cms->content!!}
        </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="whymart">
    <div class="whyLeftmart">
        <a data-fancybox href="https://www.youtube.com/watch?v=matrWxuh7gc&feature=youtu.be" class="videoArea">
            <span class="playbtn"></span>
        </a>
    </div>
    <div class="whyRightmart">
        <div class="contentArea">
            <h2>Why Disciple <span>Mart</span></h2>
            <ul class="whylist">
                <li>Learn anytime, anywhere at your own pace</li>
                <li>Get trained by top notch instructors</li>
                <li>Choose from our extensive collection of courses</li>
                <li>Earn a certificate at the end of course to make your training count</li>
            </ul>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="spacer50"></div>

@endsection