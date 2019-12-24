@extends("layouts.master")


@section("content")
<section class="panel">

   <div class="panel-body">
    <h3><i class="fa fa-key"></i> Roles Management

    <a href="{{route('permissions.index')}}" class="btn btn-primary pull-right">Permissions</a>
    <a href="{{route('role.create')}}" class="btn btn-success pull-right">Add Role</a>
    </h3>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                    <td>
                    <a href="{{ URL::to('role/'.$role->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['role.destroy', $role->id] ]) !!}
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