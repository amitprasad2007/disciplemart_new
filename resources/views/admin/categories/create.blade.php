<?php
use \App\Http\Controllers\CategoriesController;

$catecontroller = new CategoriesController();

?>

@extends('layouts.master')
@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">         
            <div class="col-md-10">
                <div class="card">
                    <div class="panel-title">Add Category</div>
                    <div class="content">
                        {!! Form::open(array('method'=>'post','route'=>'categories.store','class'=>'form-horizontal','autocomplete'=>'off','enctype'=>'multipart/form-data','id'=>'planner-form')) !!}
                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Category Parent Name </label>
                                <div class="col-sm-6">
                                    <select name="parent_id" class="form-control selectpicker" required="required">
                                        <option value="0">Select Parent Category</option>
                                        @foreach($categories as $cat)
                        <?php
                          $sub_cats = $catecontroller->category_drop_down($cat['id']);  
                        ?>
                        <option value="{{ $cat['id'] }}" <?php if(isset($category) && $category->parent_id == $cat['id']) { echo 'selected'; } ?>>{{ $cat['name'] }}</option>
                        @if(count($sub_cats)>0)
                          @foreach($sub_cats as $sub_cat)
                        <?php
                          $sub_sub_cats = $catecontroller->category_drop_down($sub_cat['id']);  
                        ?>
                            <option value="{{ $sub_cat['id'] }}" <?php if(isset($category) && $category->parent_id == $cat['id']) { echo 'selected'; } ?>>---{{ $sub_cat['name'] }}</option>
                            
                            @if(count($sub_sub_cats)>0)
                              @foreach($sub_sub_cats as $sub_sub_cat)
                                <option value="{{ $sub_sub_cat['id'] }}" <?php if(isset($category) && $category->parent_id == $cat['id']) { echo 'selected'; } ?>>------{{ $sub_sub_cat['name'] }}</option>
                              @endforeach;
                            @endif;
                          @endforeach;
                        @endif; 
                      
                                        @endforeach;
                                    </select>
                                </div>
                            </div>
                    <div class="form-group">
    <label class="col-sm-3 control-label"> Category Name </label>
    <div class="col-sm-6">        
        {!! Form::text('name',null, array('required' => 'required', 'placeholder' => 'Category Name', 'class' => 'form-control'))  !!}
    </div>
</div>
                            <div class="form-group">
                                <label class="col-md-3"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-fill btn-info">Submit</button>
                                    <a href="{{ route('categories') }}" class="btn btn-fill btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>  
</div>  
@endsection