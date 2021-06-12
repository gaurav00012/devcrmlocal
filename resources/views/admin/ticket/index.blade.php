<?php
use App\Clients;
use App\User;

?>

@extends('layouts.admin.main')
@section('heading')
Tickets
@endsection

@section('content')
<table class="table admin-user-table table-responsive-sm">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Client</th>
            <th scope="col">Subject</th>
            <th scope="col">Created at</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($getCompanyTicket as $key => $ticket)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{User::find(Clients::find($ticket->client_id)->user_id)->name}}</td>
                <td>{{$ticket->subject}}</td>
                <td>{{date('d-M-Y',strtotime($ticket->created_at))}}</td>
                <td><a href="{{url('admin/view-ticket')}}/{{$ticket->id}}" class="btn btn-info green-btn delete-btn">View</a></td>
            </tr>
        @endforeach
           
        </tbody>
</table>
<div class="text-center" style="display:flex;justify-content: center;">
    {{ $getCompanyTicket->links() }}
    </div>
@endsection
@section('vuejs')
<script  src="{{URL::asset('js/admin/user.js')}}"></script>
@endsection