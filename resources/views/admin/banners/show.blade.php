@extends('layouts.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">
                        Show Banner
                        <a class="pull-right" href="{{ route('banners.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{$banner->title}}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{$banner->description}}
                        </div>
                        <div class="form-group">
                            <strong>Link:</strong>
                            <a href="{{$banner->link}}">{{$banner->link}}</a>
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            <a href="{!! asset('banners_image/'.$banner->image) !!}">
                                <img height="70px" width="70px" src="{!! asset('banners_image/'.$banner->image) !!}" alt="no image" />
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection