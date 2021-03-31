<?php
use App\Clients;
use App\User;

?>
@extends('layouts.admin.main')
@section('heading')
View Ticket
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/manage-ticket');!!}"  class="btn btn-primary pull-right">Back</a>
</div><br>
<div class="row">
<div class="col-md-12"> 
<table style="width:100%" class="table table-bordered">
  <tr>
    <th>Client:</th>
    <td>{{User::find(Clients::find($getTicket[0]->client_id)->user_id)->name}}</td>
  </tr>
  <tr>
    <th>Subject:</th>
    <td>{{$getTicket[0]->subject}}</td>
  </tr>
  <tr>
    <th>Description:</th>
    <td>{{$getTicket[0]->description}}</td>
  </tr>
   <tr>
    <th>Created at:</th>
    <td>{{$getTicket[0]->created_at}}</td>
  </tr>
   <tr>
    <th>Updated at:</th>
    <td>{{$getTicket[0]->updated_at}}</td>
  </tr>
   <tr>
    <th>Attachment:</th>
    <td><a href="{{url('ticket-attachment')}}/{{$getTicket[0]->attachment}}">Download Attachment</a></td>
  </tr>
  <tr>
    <th>Status:</th>
    <td>{{ucfirst($getTicket[0]->status)}}</td>
  </tr>
</table>
<br><hr>

@if(!empty($getTicketComment))
@foreach($getTicketComment as $commentkey => $comment)
<div class="alert alert-success">
    <p class="pull-right">
        @if($comment->commented_by == 'company_admin')
            By Me 
        @else
        {{User::find($comment->created_by)->name}}
        @endif
        <b>at</b> {{$comment->created_at}}
    </p>
     <p>{{$comment->comment}}</p>
</div>
@endforeach
@endif

{!! Form::open(['method' => 'post']) !!}
 <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
      <option value="open">Open</option>
      <option value="close">Close</option>
    </select>
  </div>

@if($getTicket[0]->status == 'open')
<div class="form-group">
    <label for="comment">Comment</label>
    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
</div>
@endif

<button type="submit" class="btn btn-primary">Submit</button>

{!! Form::close() !!}
    </div>
     </div>   
@endsection
@section('vuejs')
<script  src="{{URL::asset('js/admin/user.js')}}"></script>
@endsection