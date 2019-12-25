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
                <div class="col-md-12 panel-title">Cms Pages</div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Page Name</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($cms)
                                    @foreach($cms as $val)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$val->page_name}}</td>
                                        <td>
                                            <a class="btn btn-info btn-fill btn-xs" href="{{ route('cms.show',$val->id) }}">Show</a>
                                            <a class="btn btn-primary btn-fill btn-xs" href="{{ route('cms.edit',$val->id) }}">Edit</a>                                        
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
</div>
</section>
          
@endsection
