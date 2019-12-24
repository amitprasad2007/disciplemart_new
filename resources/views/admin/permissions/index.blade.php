@extends("layouts.master")


@section("content")
<section class="panel">

   <div class="panel-body">
   <div class="col-lg-10 col-lg-offset-1">
    <h3><i class="fa fa-key"></i>Available Permissions
    <a href="{{route('role.index')}}"class="btn btn-primary pull-right">Roles</a>
    <a href="{{URL('permissions/create')}}"class="btn btn-success pull-right">Add Permission</a></h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

   </div>
</section>

@endsection