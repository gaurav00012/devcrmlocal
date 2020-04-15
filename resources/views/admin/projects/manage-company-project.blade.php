@extends('layouts.admin.main')
@section('heading')
Manage Projects
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/add-project').'/'.$companyId;!!}"  class="btn btn-primary pull-right" style="margin-right:1em">Add Project</a> 
    <a href="{!! url('admin/manage-client');!!}"  class="btn btn-primary pull-right">Back</a>
</div>
<p></p>
<table class="table" id="project-list">
        <thead>
            <tr>
            <th >#</th>
            <th >Project</th>
            <th >Description</th> 
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($companyprojects as $key => $companyproject)
            <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{ $companyproject->project_name }}</td>
            <td>{{ substr($companyproject->description,0,40).'...' }}</td>
            <td><a href="{!! url('admin/manage-task');!!}/{{ $companyproject->id }}"  class="btn  green-btn">View Task</a>  <a href="{!! url('admin/edit-project');!!}/{{ $companyproject->id }}"  class="btn  green-btn">Edit</a>  <a href="{!! url('admin/delete-client');!!}/{{ $companyproject->id }}"  class="btn  green-btn">Delete</a> </td>
            </tr>
        @endforeach
           
        </tbody>
</table>
@endsection
@section('vuejs')
<script  src="{{URL::asset('js/admin/user.js')}}"></script>
<script>
var view_table = $("#project-list").DataTable({
    pagingType: "full_numbers",
    //columns: columns_operation,
  });

  $(".dataTables_length").addClass("bs-select");

  //To remove unwanted class from pagination drop-down
  if ($("#project-list_length > label > select")[0])
    $("#project-list_length > label > select").removeClass(
      "custom-select-sm form-control form-control-sm"
    );
</script>
@endsection
