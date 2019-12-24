@extends('layouts.master')

@section('content')
<section class="panel">
   <header class="panel-heading">
      <div class="panel-actions">
      </div>
   </header>
   <div class="panel-body">
      <h2 class="panel-title">User List</h2>
      <div class="row">
         <div class="col-sm-6" style="float:right;">
            <div class="mb-md" style="float:right;">
               <a href="{{route('users.create')}}" class="btn btn-primary create">Add <i class="fa fa-plus"></i></a>
            </div>
         </div>
      </div>
   
               
           
      <table class="table table-bordered table-striped mb-none " id="data-table">
         <thead>
           
            <tr> <tr><th colspan=2><select name="role_filter" id="role_filter" class="form-control">
                  <option value="all_roles">All Roles</option>
                  @foreach($role as $row)
                  <option value="{{ $row->name }}">{{ ucfirst($row->name) }}</option>
                  @endforeach
               </select></th></tr>
               <th>No</th>
               <th >Name</th>
               <th >Email</th>
               <th >Role</th>
               <th>Phone Number</th>
               <th >Status</th>
               <th >Action</th>
            </tr>
         </thead>
         <tbody>
         </tbody>
      </table>

<script type="text/javascript">
$(document).ready(function(){
fetch_data();
    function fetch_data(role = '')
       { 
           $('#data-table').DataTable({    
               processing: true,
               serverSide: true,      
                ajax: {
               
                  url:"{{ route('users.index') }}",
                  data: {role:role},
                  
                },          
                columns: [         
                   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data: 'name', name: 'name' },
                   {data: 'email', name: 'email'},
                  {data:'role_name',name:'role_name'},
                   {data: 'phone_number',name:'phone_number'},
                   {data: 'status', name: 'status', orderable: false, searchable: false},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
                   ]
         
           });

           }

           $('#role_filter').change(function(){
            var role_name = $('#role_filter').val();
           
            $('#data-table').DataTable().destroy();
            fetch_data(role_name);

            });
         
   });
         
      </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(function () {
        $(document).on("click", ".btn-student-delete", function () {
            var conf = confirm("Are you sure want to delete ?");
            if (conf) {
                // ajax call functions
                var delete_id = $(this).attr("data-id"); // delete id of delete button
                var postdata = {
                    "_token": "{{ csrf_token() }}",
                    "delete_id": delete_id
                }
                $.post("{{ route('usersdestroy') }}", postdata, function (response) {
                    var data = $.parseJSON(response);
                    if (data.status == 1) {
                      swal(data.message);
                        location.reload();
                    } else {
                        swal(data.message);
                    }
                })
            }
        });
    });
</script>
   </div>
</section>
          
@endsection
