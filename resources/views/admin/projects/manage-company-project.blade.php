@extends('layouts.admin.main')
@section('heading')
Manage Projects
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/add-project').'/'.$companyId;!!}"  class="btn btn-primary pull-right" style="margin-right:1em">Add Project</a> 
    <a href="{!! url('admin/manage-client');!!}"  class="btn btn-primary pull-right">Back</a>
</div>
<table class="table admin-user-table">
        <thead>
            <tr>
            <th class="col-sm-3">#</th>
            <th class="col-sm-3">Project</th>
            <th class="col-sm-3">Description</th> 
            <th class="col-sm-3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($companyprojects as $key => $companyproject)
            <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{ $companyproject->project_name }}</td>
            <td>{{ substr($companyproject->description,0,40).'...' }}</td>
            <td><a href="{!! url('admin/manage-task');!!}/{{ $companyproject->id }}"  class="btn  green-btn">View Task</a>  <a href="{!! url('admin/edit-client');!!}/{{ $companyproject->id }}"  class="btn  green-btn">Edit</a>  <a href="{!! url('admin/delete-client');!!}/{{ $companyproject->id }}"  class="btn  green-btn">Delete</a> </td>
            </tr>
        @endforeach
           
        </tbody>
</table>
@endsection
@section('vuejs')
<script  src="{{URL::asset('js/admin/user.js')}}"></script>
@endsection
