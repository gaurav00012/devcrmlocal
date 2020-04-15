@extends('layouts.admin.main')
@section('heading')
Manage Clients
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/create-client');!!}"  class="btn btn-primary pull-right">Add Client</a>
</div>
<p></p>
<table class="table admin-client-table" id="client-table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Client Name</th>
            <th scope="col">Description</th> 
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($allClient as $key => $project)
            <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{ $project->company_name }}</td>
             <td>{{ substr($project->description,0,40).'...' }}</td>
            
            <td><a href="{!! url('admin/manage-projects');!!}/{{ $project->id }}"  class="btn  green-btn">View Project</a>  <a href="{!! url('admin/edit-client');!!}/{{ $project->id }}"  class="btn  green-btn">Edit</a>  <a href="{!! url('admin/delete-client');!!}/{{ $project ->id }}"  class="btn  green-btn">Delete</a> </td>
            </tr>
        @endforeach
           
        </tbody>
</table>
@endsection
@section('vuejs')
<!-- <script  src="{{URL::asset('js/admin/user.js')}}"></script> -->
<script>
var view_table = $("#client-table").DataTable({
    pagingType: "full_numbers",
    //columns: columns_operation,
  });

  $(".dataTables_length").addClass("bs-select");

  //To remove unwanted class from pagination drop-down
  if ($("#client-table_length > label > select")[0])
    $("#client-table_length > label > select").removeClass(
      "custom-select-sm form-control form-control-sm"
    );
</script>
@endsection
