<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\TeamMember;
use App\MasterCompany;
use Auth;

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
        //$allUser = User::where('user_role','=',2)->get();
        //$
        $user = Auth::user();
       // dd($user);
        $getCompanyId = MasterCompany::where('user_id','=',$user->id)->get();
       // dd($getCompanyId);
         $allTeam = TeamMember::where('company_id','=',$getCompanyId[0]->id)->get();
        // dd($allTeam);
        
         return view('admin/team/index',['allTeam'=> $allTeam]);
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
        $authUser = Auth::user();
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
         ]);
         $getCompanyId = MasterCompany::where('user_id','=',$authUser->id)->get();
      //   dd($getCompanyId[0]->id);

         $input = $request->post();
         $user['name'] = $input['name'];
         $user['user_role'] = 2;
         $user['email'] = $input['email'];
         $user['password'] = bcrypt($input['password']);
         $user['text_password'] = $input['password'];
         $newUser = User::create($user);

         $teamMember['user_id'] = $newUser->id;
         $teamMember['company_id'] = $getCompanyId[0]->id;
         //$newTeamMember = TeamMember::create($teamMember);

        if(TeamMember::create($teamMember))
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
