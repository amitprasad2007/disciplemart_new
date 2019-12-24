@extends("layouts.master")


@section("content")
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <section class="content-header">
     <ol class="breadcrumb">    </ol>

                    <!--  -->
                </div>

        <h1>
            List Students
        </h1>    

    </section>
    <div class="box box-primary">
        <div class="box-header with-border"></div>
        <table class="table table-bordered data-table">
            <thead>
            <tr>
            <th width="3%">SL No</th>
             <th>Name</th>
             <th>Email</th>
             <th>Date of Birth</th>
             <th>Phone Number</th>
             <th>Action</th>
             <th>Status</th>
            </tr>
            </thead>
             <tbody>
                 
             </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">

  $(function () {

    

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('liststudents-data') }}",

        columns: [

            {data: 'id', name: 'id'},

            {data: 'name', name: 'name'},

            {data: 'email', name: 'email'},
            {data: 'dob', name: 'dob'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'action_btns', name: 'action_btns'},
            {data:'status',name:'status'},

        ]

    });

    

  });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endsection