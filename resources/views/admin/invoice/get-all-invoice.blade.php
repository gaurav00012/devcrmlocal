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
           <th>Created At</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($client->getInvoice as $key => $invoice)
            <tr>
          	  <td>{{ $key+1 }}</td>
              <td><a href="#" onclick='window.open("http://devcrm.local.com/view-invoice/{{$invoice->invoice_id}}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=700,left=500,width=800,height=600")'>{{ $invoice->invoice_id }}</a></td>
              <td>{{ date('d-M-Y',strtotime($invoice->created_at)) }}</td>
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