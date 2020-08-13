<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\MasterProject;
use App\MasterCompany;
use App\ClientForm;
use Auth;

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
        $result['success'] = true;
        try{
        $this->validate($request,[
            'company_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'company_description' => 'required',
            
         ]);
         $input = $request->post();
         $user['name'] = $input['company_name'];
         $user['email'] = $input['email'];
         $user['user_role'] = 3;
         $user['password'] = bcrypt('test12345');
         $user['text_password'] = 'test12345';
         $user = User::create($user);

         $client['user_id'] = $user->id;
         $client['company_name'] = $input['company_name'];
         $client['description'] = $input['company_description'];
        
         if(MasterCompany::create($client))
         {
            return redirect('/admin/manage-client')->with('success', 'Client added successfully');
         }
        } catch(\Exception $e){
                $result['success'] = false;   
                $result['error'] = $e->getMessage();
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
        
        if($client->save())
        {
            return redirect('/admin/manage-client')->with('success', 'Client updated successfully');    
        }
        
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

    public function newRegisteration()
    {
        $result['success'] = true;
        $result['exception_message'] = '';

        try{
            $newRegisterations = ClientForm::where('is_approved','=',0)->get();
            return view('admin.clients.new-registeration',['newRegisterations'=>$newRegisterations]);

        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return $result;
        }
    }

    public function getNewClient(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';

        try
        {
            $post = $request->post();
            $clientDetail = ClientForm::find($post['clientid']);
            return view('admin.clients.get-new-client',['clientDetail'=>$clientDetail]);
        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return $result;
        }
    }

    public function approveClient(Request $request)
    {
        $result['success'] = true;
        $result['exception_message'] = '';

        try
        {
            //$user = Auth::user();
            $post = $request->post();
            $clientDetail = ClientForm::find($post['clientid']); 
            $clientDetail->is_approved = 1;
            $clientDetail->save();
            $user['name'] = $clientDetail->company_name;
            $user['email'] = $clientDetail->email;
            $user['user_role'] = 3;
            $user['password'] = bcrypt('test12345');
            $user['text_password'] = 'test12345';
            $user['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $clientDetail->company_name)));
            $user['c_id'] = $clientDetail->id;

             $user = User::create($user);

             $client['user_id'] = $user->id;
             $client['company_name'] = $clientDetail->company_name;
             $client['description'] = $clientDetail->about_business;
             $client['created_by'] = Auth::user()->id;
            // MasterCompany::create($client);
             if(MasterCompany::create($client))
             {
                $result['user_id'] = $user->id;
                return $result;
             }

        }
        catch(\Exception $e)
        {
            $result['success'] = false;
            $result['error'] = $e->getMessage();
            return $result;
        }
    }
}
