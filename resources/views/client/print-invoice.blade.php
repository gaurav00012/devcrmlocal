<!DOCTYPE html>
<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
</head>
<body>
    <div class="col-md-12">
        <br>
    <button class="btn btn-primary pull-right" onclick="window.print();">Print</button> 
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">

            <div class="invoice-title">
                <h2>Invoice</h2><h3 class="pull-right"> # {{$invoiceItemDetail[0]->invoice_id}}</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong>Billed To:</strong><br>
                        {{Auth::user()->name}}<br>
                       {{Auth::user()->email}}<br>
                        <br>
                        
                    </address>
                </div>
                <!-- <div class="col-xs-6 text-right">
                    <address>
                    <strong>Shipped To:</strong><br>
                        Jane Smith<br>
                        1234 Main<br>
                        Apt. 4B<br>
                        Springfield, ST 54321
                    </address>
                </div> -->
            </div>
            <div class="row">
               <!--  <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** 4242<br>
                        jsmith@email.com
                    </address>
                </div> -->
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                       {{date('d-M-Y',strtotime($invoiceItemTotal[0]->created_at))}}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                @foreach($invoiceItemDetail as $invoiceKey => $invoice)
                                <tr>
                                    <td>{{$invoice->item_name}}</td>
                                    
                                    <td class="text-center">{{$invoice->price}}</td>
                                    <td class="text-right">{{$invoice->quantity}}</td>
                                    <td class="text-right">{{$invoice->price * $invoice->quantity}}</td>
                                </tr>
                                @endforeach
                               
                               
                                
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">{{$invoiceItemTotal[0]->total}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
             
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type='hidden' name='business' value='diwakarmishra1.0@gmail.com'> 
            <input type='hidden' name='item_name' value='{{$invoiceItemDetail[0]->invoice_id}}'> 
            <input type='hidden' name='item_number' value='{{$invoiceItemDetail[0]->invoice_id}}'> 
            <input type='hidden' name='amount' value='{{$invoiceItemTotal[0]->total}}'> 
            <input type='hidden' name='no_shipping' value='1'> 
            <input type='hidden' name='currency_code' value='USD'> 
            <input type='hidden' name='notify_url' value='http://localhost/paypal-php/notify.php'>
            <input type='hidden' name='cancel_return' value="{{url('cancel-paypal')}}/{{$invoiceItemDetail[0]->invoice_id}}">
            <input type='hidden' name='return' value='http://localhost/paypal-php/return.php'>
            <input type="hidden" name="cmd" value="_xclick"> 
            <input class="btn btn-primary pull-right" type="submit" name="pay_now" id="pay_now" Value="Pay Now">
        </form>
            <!--  <button class="btn btn-primary pull-right">Pay</button> -->
        </div>
    </div>
</div>
</body>
</html>