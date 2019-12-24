@extends('layouts.master')

@section('content')
<section class="panel">
   <header class="panel-heading">
      <div class="panel-actions">
      </div>
   </header>
   <div class="panel-body">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="col-md-12 panel-title">
                        Show Advertisement
                        <a class="btn btn-primary btn-fill btn-sm pull-right" href="{{ route('advertisements.index') }}"> Back</a>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{$advertisement->title}}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{$advertisement->description}}
                        </div>
                        <div class="form-group">
                            <strong>Link:</strong>
                            <a href="{{$advertisement->link}}">{{$advertisement->link}}</a>
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            <a href="{!! asset('advertisements_image/'.$advertisement->image) !!}">
                                <img height="70px" width="70px" src="{!! asset('advertisements_image/'.$advertisement->image) !!}" alt="no image" />
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   </div>
</section>
          
@endsection