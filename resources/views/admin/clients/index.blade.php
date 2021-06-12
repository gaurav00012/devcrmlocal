<?php
use App\User;
//dd(Auth::user()->companyuser);
?>
@extends('layouts.admin.main')
@section('heading')
Manage Clients
@endsection

@section('content')
<!-- <div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/create-client');!!}"  class="btn btn-primary pull-right">Add Client</a>
</div> -->
<p></p>
@if(!Auth::user()->companyuser->getClients->isEmpty())
<table class="table admin-client-table table-responsive-xl" id="client-table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Client Name</th>
            <th scope="col">Client E-Mail</th>
            <th scope="col">Description</th> 
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($getClient as $key => $client)
            <tr>
            <th scope="row">{{$key+1}}</th>
            <td><a href="{{url(User::find($client->user_id)->slug)}}">{{ User::find($client->user_id)->name }}</a></td>
            <td>{{ User::find($client->user_id)->email }}</td>
             <td>{{ substr($client->client_description,0,40).'...' }}</td>
            
            <td>
                <a href="{!! url('admin/manage-invoice');!!}/{{ $client->id }}"  class="btn green-btn invoice-btn mr-1" title="Manage Invoice"><i class="fa fa-files-o"></i></a>  
                <a href="{!! url('admin/manage-projects');!!}/{{ $client->id }}"  class="btn  green-btn view-btn mr-1" title="View Project"><i class="icon-eye"></i></a>  
                <a href="{!! url('admin/edit-client');!!}/{{ $client->id }}"  class="btn  green-btn edit-btn mr-1" title="Edit"><i class="icon-pencil"></i></a>  
                <a href="{!! url('admin/delete-client');!!}/{{ $client->user_id }}"  class="btn  green-btn delete-btn" title="Delete"><i class="icon-trash"></i></a> 
            </td>
            </tr>
        @endforeach
           
        </tbody>
</table>
@else
<p>No Records found</p>
@endif
<div class="text-center" style="display:flex;justify-content: center;">
    {{ $getClient->links() }}
    </div>
@endsection
@section('vuejs')
<!-- <script  src="{{URL::asset('js/admin/user.js')}}"></script> -->
<script>
// var view_table = $("#client-table").DataTable({
//     pagingType: "full_numbers",
//   });

//   $(".dataTables_length").addClass("bs-select");
//   if ($("#client-table_length > label > select")[0])
//     $("#client-table_length > label > select").removeClass(
//       "custom-select-sm form-control form-control-sm"
//     );
</script>
@endsection
