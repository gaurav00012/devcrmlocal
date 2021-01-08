<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\MasterProject;
use App\MasterCompany;
use App\Clients;
use App\ClientForm;
use Auth;
use App\Traits\Email;
// use Email;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     use Email;
    public function index()
    {
        $user = Auth::user();
       // dd($user->companyuser);
         //$companyId = $user->companyuser->id;
       //  $clients =  $user->companyuser->getClients;
        // dd($clients);
        //$allClient = Clients::;
        //$clientProject = new MasterCompany;
       
       //return view('admin/clients/index',['allCompanies'=> $allCompanies]);
        
        return view('admin/clients/index');
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
            'client_name' => 'required',
            'client_email' => 'required|email|unique:users,email',
            'client_description' => 'required',
            
         ]);
        $User = Auth::user();
         $input = $request->post();
         $user['name'] = $input['client_name'];
         $user['email'] = $input['client_email'];
         $user['user_role'] = 3;
         $user['password'] = bcrypt('test12345');
         $user['text_password'] = 'test12345';
         $user = User::create($user);

         $client['user_id'] = $user->id;
         //$client['company_name'] = $input['company_name'];
         $client['company_id'] = $User->companyuser->id;
         $client['client_description'] = $input['client_description'];
        
         if(Clients::create($client))
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
        $client = Clients::find($id);
        $clientUserDetail = $client->getUser;
        $clientFormDetail = $client->getUser->userclient;
        //dd($clientDetail);
        return view('admin/clients/editclient',['client'=>$client,'clientFormDetail'=>$clientFormDetail]);
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
        $client = Clients::find($id);
        $userDetailId = $client->getUser->id;
        $registertionDetail = $client->getUser->userclient->id;

        $updateregistertionDetail = ClientForm::updateClientDetail($registertionDetail,$request->post());
        $updateClientDetail = Clients::updateClientsDetails($id,$request->post());
        $updateUserDetail = User::updateUser($id,$request->post());
        // $client->company_name = $request->post('company_name');
        // $client->description = $request->post('company_description');
        
        // if($client->save())
        // {
        //     return redirect('/admin/manage-client')->with('success', 'Client updated successfully');    
        // }
         return redirect('/admin/manage-client')->with('success', 'Client updated successfully');    
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

        // echo '<pre>';

        // exit;

        try
        {
            $authUser = Auth::user();

           //dd($user->companyuser->id);
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

             $client['client_description'] = $clientDetail->about_business;
             $client['company_id'] = $authUser->companyuser->id;
             $client['user_id'] = $user->id;
            // $client['company_name'] = $clientDetail->company_name;
             
             $client['created_by'] = Auth::user()->id;
            // MasterCompany::create($client);
             //  if(MasterCompany::create($client))
             //  {
             //     $name = 'Gaurav';
             //     $subject = 'You are now onboard with Onelook';
             //     $body = view('emails.client-welcome',['user'=>$user,'client'=>$client]);
             //     $this->sendMail($clientDetail->email,$name,$subject,$body);
             //    $result['user_id'] = $user->id;
               
             //    return $result;
             // }
              if(Clients::create($client))
              {
                 //$name = 'Gaurav';
                 //$subject = 'You are now onboard with Onelook';
                 //$body = view('emails.client-welcome',['user'=>$user,'client'=>$client]);
                 //$this->sendMail($clientDetail->email,$name,$subject,$body);
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
