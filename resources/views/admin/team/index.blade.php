@extends('layouts.admin.main')
@section('heading')
Manage Team
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/create-team');!!}"  class="btn btn-primary pull-right">Add Team Member</a>
</div>
<table class="table admin-user-table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">E-Mail</th>
            <!-- <th scope="col">Role</th> -->
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($allUser as $key => $user)
            <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <!-- <td>{{ $user->user_role }}</td> -->
            <td><a href="{!! url('admin/edit-team');!!}/{{ $user->id }}"  class="btn btn-info green-btn">Edit</a> | <a href="{!! url('admin/delete-team');!!}/{{ $user->id }}"  class="btn btn-info green-btn">Delete</a> </td>
            </tr>
        @endforeach
           
        </tbody>
</table>
@endsection
@section('vuejs')
<script  src="{{URL::asset('js/admin/user.js')}}"></script>
@endsection
