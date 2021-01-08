<?php
use App\User;
?>

@extends('layouts.admin.main')
@section('heading')
Manage Team
@endsection

@section('content')
<div class="col-xs-6 mb-3" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/create-team');!!}"  class="btn btn-primary pull-right">Add Team Member</a>
</div>
<table class="table admin-user-table table-responsive-sm">
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
        @foreach ($allTeam as $key => $user)
            <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{ User::find($user->user_id)->name }}</td>
            <td>{{ User::find($user->user_id)->email }}</td>
            <!-- <td>{{ $user->user_role }}</td> -->
            <td><a href="{!! url('admin/edit-team');!!}/{{ $user->user_id }}"  class="btn btn-info green-btn edit-btn mr-2" title="Edit"><i class="icon-pencil"></i></a><a href="{!! url('admin/delete-team');!!}/{{ $user->id }}"  class="btn btn-info green-btn delete-btn" title="Delete"><i class="icon-trash"></i></a> </td>
            </tr>
        @endforeach
           
        </tbody>
</table>
@endsection
@section('vuejs')
<script  src="{{URL::asset('js/admin/user.js')}}"></script>
@endsection
