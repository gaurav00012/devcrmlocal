<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\MasterProject;
use App\MasterCompany;
use App\Clients;
use App\ClientForm;
use Auth;
use App\Traits\Email;
use App\ClientTicket;
use App\TicketComment;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $user = Auth::user();
            $user->companyuser->id;
            $getCompanyTicket = ClientTicket::where('company_id','=',$user->companyuser->id)->paginate(10);

            return view('admin.ticket.index',['getCompanyTicket'=>$getCompanyTicket]);
        }
        catch(\Exception $e){
           $result['success'] = false;
           $result['exception_message'] = $e->getMessage();
           return $result;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $getTicket = ClientTicket::where('id','=',$id)->get();
            $getTicketComment = TicketComment::where('ticket_id','=',$id)->get();
            //dd($getTicketComment);
            return view('admin.ticket.view-ticket',['getTicket'=>$getTicket,'getTicketComment'=>$getTicketComment]);
        }
        catch(\Exception $e)
        {
           $result['success'] = false;
           $result['exception_message'] = $e->getMessage();
        }
    }

    public function saveTicketStatus(Request $request,$id)
    {
        $result['success'] = true;
        $result['exception_message'] = '';
        try
        {
            $user = Auth::user();
            $user->companyuser->id;

            $post = $request->post();
            $getClientTicket = ClientTicket::find($id);
            $getClientTicket->status = $post['status'];
            $getClientTicket->save();
            
            if($post['comment'] != '')
            {
                $ticketComment['ticket_id'] = $id;
                $ticketComment['comment'] = $post['comment'];
                $ticketComment['commented_by'] = 'company_admin';
                $ticketComment['created_by'] = $user->id;
                $ticketComment['updated_by'] = $user->id;
                TicketComment::create($ticketComment);
            }
            return redirect("/admin/view-ticket/$id")->with('success', 'Ticket Updated successfully');
        }
        catch(\Exception $e)
        {
           $result['success'] = false;
           $result['exception_message'] = $e->getMessage();
        }
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
}
