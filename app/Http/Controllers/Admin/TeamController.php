<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allUser = User::where('user_role','=',2)->get();
        
        return view('admin/team/index',['allUser'=> $allUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/team/addteam');
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
         ]);
         $input = $request->post();
         $user['name'] = $input['name'];
         $user['user_role'] = 2;
         $user['email'] = $input['email'];
         $user['password'] = bcrypt($input['password']);
         $user['text_password'] = $input['password'];
            
        if(User::create($user))
        {
         return redirect('/admin/manage-team')->with('success', 'Team Member added successfully');   
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
        $user = User::find($id);
        return view('admin/team/editteam',['user'=>$user]);
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
        $user = User::find($id);
       
        $user->name = $request->post('name');
       // $user->email = $request->post('email');
        $user->password = bcrypt($request->post('password'));
        $user->text_password = $request->post('password');

        if($user->save())
        {
            return redirect('/admin/manage-team')->with('success', 'Team Member updated successfully'); 
        }

        //return redirect('/admin/manage-team');
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

        if($user->delete())
        {
            return redirect('/admin/manage-team')->with('success', 'Team Member Deleted successfully'); 
        }
        
        //return redirect('/admin/manage-team');
    }
}
