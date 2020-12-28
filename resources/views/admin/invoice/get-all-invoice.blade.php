@extends('layouts.admin.main')
@section('heading')
Manage Invoice
@endsection

@section('content')

<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/create-invoice');!!}/{{ $client->id }}"  class="btn btn-primary pull-right">Create Invoice</a>
</div>

@if(!$client->getInvoice->isEmpty())
<table class="table admin-client-table" id="client-table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Invoice Number</th> 
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($client->getInvoice as $key => $invoice)
            <tr>
          	  <td>{{ $key+1 }}</td>
             <td>{{ $invoice->id }}</td>
            </tr>
        @endforeach
           
        </tbody>
</table>
@else
<p>No Records found</p>
@endif



@endsection

@section('vuejs')

@endsection