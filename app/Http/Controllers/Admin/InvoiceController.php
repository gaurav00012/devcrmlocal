<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clients;
use App\MasterCompany;
use App\User;
use App\MasInvoice;
use App\MasInvoiceItemDetail;
use App\MasInvoiceItemTotal;
use Auth;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try
        {

        }
        catch(\Exception $e)
        {

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {

            $client = Clients::find($id);
           
            return view('admin/invoice/create-invoice',['client'=>$client]);
        }
        catch(\Exception $e)
        {
             $result['success'] = false;
             $result['exception_message'] = $e->getMessage();
             return $result;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';

        try
        {
            $user = Auth::user();
            $companyUser = $user->companyuser;
            // echo '<pre>'; print_r($companyUser->id); echo '</pre>';    
            // return;
           // echo '<pre>'; print_r($companyUser->id); echo '</pre>';
            // echo $id;
            //echo '<pre>'; print_r($request->post()); echo '</pre>'; 
            //return;
            $invoiceNumber = $request->post()['invoice_number'];
            $itemName = $request->post()['item_name'];
            $itemDescription = $request->post()['invoice_description'];
            $itemCost = $request->post()['cost'];
            $itemQuantity = $request->post()['quantity'];

            $total = 0;
            $invoiceId = $request->post()['invoice_number'];

            foreach($itemName as $itemKey => $name)
            {

              $itemTotal = 0;   
              $name = $itemName[$itemKey];
              $description = $itemDescription[$itemKey];
              $cost = $itemCost[$itemKey];
              $quantity = $itemQuantity[$itemKey];
              $itemTotal = $cost*$quantity;

              $masInvoiceDetail = new MasInvoiceItemDetail;
              $masInvoiceDetail->invoice_id = $invoiceNumber;
              $masInvoiceDetail->item_name = $name;
              $masInvoiceDetail->quantity = $quantity;
              $masInvoiceDetail->price = $cost;
              $masInvoiceDetail->amount = $itemTotal;
              $masInvoiceDetail->save();

              $total += $itemTotal;   
            }

            $masInvoice = new MasInvoice;
            $masInvoice->invoice_id = $invoiceId;
            $masInvoice->client_id = $id;  
            $masInvoice->company_id = $companyUser->id;
            $masInvoice->save();  

            $masInvoiceItemTotal = new MasInvoiceItemTotal;
            $masInvoiceItemTotal->invoice_id = $invoiceId;
            $masInvoiceItemTotal->total = $total;
            $masInvoiceItemTotal->save();
           
           return redirect('admin/manage-invoice/'.$id)->with('success', 'Invoice Created Successfully');

    
        }
        catch(\Exception $e)
        {
            $result['success'] = false;
             $result['exception_message'] = $e->getMessage();
             return $result;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllInvoice($id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $client = Clients::find($id);
            $clientUserDetail = $client->getUser;
            $clientInvoice = $client->getInvoice;

            return view('admin/invoice/get-all-invoice',['client'=>$client]);
        }
        catch(\Exception $e)
        {
             $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
        }
    }

    public function viewInvoice($invoiceId)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {

        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['exception_message'] = $e->getMessage();
        }
    }
}
