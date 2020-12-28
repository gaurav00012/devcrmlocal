<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clients;
use App\MasterCompany;
use App\User;

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
    public function store(Request $request)
    {
        //
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
}
