@extends('layouts.master')
@section('content')
<div class="content">
<div class="panel-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card"> 
                    <div class="panel-title">Search Keywords</div>
                    <div class="content">
                        <div class="toolbar"></div>
                        <div class="fresh-datatables">
                            <table id="datatables" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Keywords</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $slno = 1; ?>
                                    @if($keywords)
                                    @foreach($keywords as $val)
                                    <tr>
                                        <td>{{$slno}}</td>
                                        <td>{{$val->keywords}}</td>
                                    </tr>
                                    <?php $slno = $slno + 1; ?>    
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                             {{ $keywords->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop