@extends('layouts.main')

@section('content')

<div class="clearAll"></div>

<div class="courseDAreaHead cms">
    <div class="container">
        <h3>{{$cms->page_name}}</h3>
        <!--<p>Aenean sodales nibh eget ves ti bulum venenatis. Sed fringilla leo erat. Praesent sed scelerisque.</p>-->
    </div>
</div>

<div class="clearfix"></div>
<div class="spacer50"></div>

<div class="container cmscontent">
    <div class="row">
        <div class="col-sm-12">
            {!!$cms->content!!}
        </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="spacer50"></div>

@endsection