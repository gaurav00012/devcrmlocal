
@extends('layouts.admin.main')
@section('heading')
Create Invoice for {{$client->getUser->name}}
@endsection

@section('content')

<div id="page-wrap">
	<form method="post">
		@csrf
		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
            <img src="{{asset('images/em-crm-logo.png')}}" height="100" width="200">
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title">{{$client->getUser->name}}</textarea>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea name="invoice_number">{{mt_rand(100000,999999)}}</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date" name="date"></textarea></td>
                </tr>
              <!--   <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"></div></td>
                </tr> -->

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name">
		      	<div class="delete-wpr"><textarea name="item_name[]"></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea name="invoice_description[]"></textarea></td>
		      <td><textarea class="cost" name="cost[]"></textarea></td>
		      <td><textarea class="qty" name="quantity[]"></textarea></td>
		      <td><span class="price" name="price[]"></span></td>
		  </tr>
		  
		 
		  
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value" ><div id="subtotal"></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total"></div></td>
		  </tr>
		 <!--  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid">$0.00</textarea></td>
		  </tr> -->
		  <!-- <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due"></div></td>
		  </tr> -->
		
		</table>
		
		<div id="terms">
		  <!-- <h5>Terms</h5> -->
		  <!-- <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea> -->
		</div>
		<button class="btn btn-primary" type="submit">Create</button>
		</form>
	</div>

@endsection

@section('vuejs')

<link rel="stylesheet" href="{{asset('css/invoice/print.css')}}" media="print">
<link rel="stylesheet" href="{{asset('css/invoice/style.css')}}">
<script src="{{asset('js/invoice/example.js')}}"></script>


@endsection