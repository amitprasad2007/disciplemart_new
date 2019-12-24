@extends('layouts.master')

@section('content')
  <section class="panel">
<div class="content">
    <div class="container-fluid">
    	  <div class="panel-body"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
				  
           <a class="btn btn-primary btn-fill btn-sm pull-right" href="{{ route('categories') }}"> Back</a>
               <h2 class="panel-title">Show Category</h2> <br>
               <div class="content">
                        <div class="form-group">
                            <li><strong>Name:</strong>
                            {{ $category[0]->name }}</li>
                    
                            <li><strong>Parent Category:</strong>
                            @if($category[0]->parent_category) {{$category[0]->parent_category}} @else {{ 'NA' }} @endif</li>
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