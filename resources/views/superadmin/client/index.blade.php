<?php
use App\User;
?>

@extends('layouts.admin.main')
@section('heading')
Manage Company
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('super-admin/create-client');!!}"  class="btn btn-primary pull-right">Add Company</a>
</div>
<p></p>
<table class="table admin-client-table" id="client-table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Description</th> 
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($allCompanies as $key => $company)
            <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{ $company->company_name }}</td>
            <td>{{ User::find($company->user_id)->email }}</td>
             <td>{{ substr($company->description,0,40).'...' }}</td>
            <td><a href="{!! url('super-admin/edit-client');!!}/{{ $company->id }}"  class="btn  green-btn">Edit</a>  <a href="{!! url('admin/delete-client');!!}/{{ $company ->id }}"  class="btn  green-btn">Delete</a> </td>
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
