@extends("layouts.master")


@section("content")
<section class="panel">

   <div class="panel-body">

   <div class='col-lg-4 col-lg-offset-4'>

<h3><i class='fa fa-key'></i> Add Role</h3>
<hr>

{{ Form::open(array('url' => 'role/store')) }}

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<h5><b>Assign Permissions</b></h5>

<div class='form-group'>
    @foreach ($permissions as $permission)
        {{ Form::checkbox('permissions[]',  $permission->id ) }}
        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

    @endforeach
</div>

{{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>


</div>
</section>

@endsection