<?php
use App\Clients;
use App\User;

?>
@extends('layouts.admin.frontend')
@section('heading')
View Ticket
@endsection

@section('content')
<main class="py-5">

         <section>
            <div class="container">
<div class="row">
<div class="col-md-12"> 
<div class="projects-overview bg-white p-4 rounded task-box shadow-sm">	
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
        @if($comment->commented_by == 'client')
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
     </div>   


        
            </div >
            	 </section>
</main>
@endsection

@section('vuejs')