@extends('layouts.master')

@section('content')
<section class="panel">
   <header class="panel-heading">
      <div class="panel-actions">
      </div>
   </header>
   <div class="panel-body">
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="col-md-12 panel-title">Advertisements</div>
                     <div class="row">
         <div class="col-sm-6" style="float:right;">
            <div class="mb-md" style="float:right;">
               <a href="{{route('advertisements.create')}}" class="btn btn-primary create">Add <i class="fa fa-plus"></i></a>
            </div>
         </div>
      </div>
                    <div class="content">
                        <div class="toolbar">
                        </div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Image</th>                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($advertisements)
                                    @foreach($advertisements as $advertisement)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$advertisement->title}}</td>
                                        <td><a href="{{$advertisement->link}}">{{$advertisement->link}}</a></td>
                                        <td>
                                            <a href="{!! asset('advertisements_image/'.$advertisement->image) !!}">
                                                <img height="70px" width="70px" src="{!! asset('advertisements_image/'.$advertisement->image) !!}" alt="no image" />
                                            </a>    
                                        </td>
                                        <td>
                                            @if($advertisement->is_active == 0)
                                            <a class="btn btn-danger btn-fill btn-xs" href="{{ URL::to('advertisements/changestatus/'.$advertisement->id) }}">Inctive</a>
                                            @else
                                            <a class="btn btn-success btn-fill btn-xs" href="{{ URL::to('advertisements/changestatus/'.$advertisement->id) }}">Active</a>
                                            @endif
                                            <a class="btn btn-info btn-fill btn-xs" href="{{ route('advertisements.show',$advertisement->id) }}">Show</a>
                                            <a class="btn btn-primary btn-fill btn-xs" href="{{ route('advertisements.edit',$advertisement->id) }}">Edit</a>                                            
                                            <a href="#" data-toggle="modal" data-target="#confirm-delete{{$advertisement->id}}" class="btn btn-danger btn-fill btn-xs">Delete</a>
                                            <div class="modal fade" id="confirm-delete{{$advertisement->id}}" role="dialog" style="text-align: left;">
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
                                                            {!! Form::open(['method' => 'DELETE','route' => ['advertisements.destroy', $advertisement->id],'style'=>'display:inline']) !!}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




   </div>
</section>
          
@endsection
