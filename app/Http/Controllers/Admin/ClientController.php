<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\MasterProject;
use App\MasterCompany;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $allUser = User::where('user_role','=',3)->get();
       // dd(MasterProject::all());
        //return view('admin.user.user-listing',['allUser'=> $allUser]);
        $allClient = MasterCompany::all();
        $clientProject = new MasterCompany;
       
        return view('admin/clients/index',['allClient'=> $allClient]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/clients/addclient');
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
        $this->validate($request,[
            'company_name' => 'required',
            'company_description' => 'required',
            
         ]);
         $input = $request->post();
         $client['company_name'] = $input['company_name'];
         $client['description'] = $input['company_description'];
        
         $client = MasterCompany::create($client);

         return redirect('/admin/manage-client');
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
        $client = MasterCompany::find($id);
        return view('admin/clients/editclient',['client'=>$client]);
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
        $client = MasterCompany::find($id);
       
        $client->company_name = $request->post('company_name');
        $client->description = $request->post('company_description');
        
        $client->save();
        return redirect('/admin/manage-client');
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
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/manage-client');
    }
}
