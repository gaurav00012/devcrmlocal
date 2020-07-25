<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientForm;
use App\Traits\StoreImageTrait;

class WebController extends Controller
{
    use StoreImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       return view('frontend.web.index');
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
        $result['success'] = true;
        $result['exception_message'] = '';

        try
        {
             $this->validate($request,[
                'company_name' => 'required',
                'contact_person' => 'required',
                'email' => 'required|email',
               // 'company_logo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
                // 'mailing_address' => 'required',
                // 'business' => 'required',
                // 'access' => 'required',
                // 'hosting' => 'required',
             ]);
           

             $post = $request->post();

             $form['company_name'] = $post['company_name'];
             $form['contact_person'] = $post['contact_person'];
             $form['email'] = $post['email'];
             $form['mailing_address'] = $post['mailing_address'];
             $form['about_business'] = $post['business'];
             $form['domain_name'] = $post['access'];
             $form['hosting_access'] = $post['hosting'];
             $form['hosting_email'] = $post['youremails'];
             $form['content'] = $post['content'];
             $form['copy'] = $post['copy'];
             $form['primary_goal'] = $post['primary'];
             $form['target_geographic'] = $post['geographic'];
             $form['target_audience'] = $post['audience'];
             $form['describe_word_1'] = isset($post['q3']) ? $post['q3'] : '';
             $form['describe_word_2'] = isset($post['q4']) ? $post['q4'] : '';
             $form['describe_word_3'] = isset($post['q5']) ? $post['q5'] : '';
             $form['company_colors'] = $post['colours'];
             $form['navigation'] = $post['navigation'];
             $form['competitors'] = $post['competitors'];
             $form['reference'] = $post['reference'];
             $form['additional_notes'] = $post['additional'];
             $form['ip'] = $request->ip();
             $image = $request->file('company_logo');
            $logoName = 'company_logo_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = 'company_logo/';
            $image->move($destinationPath, $logoName);
            $form['company_logo'] = $logoName;
               
             if(ClientForm::create($form)){
                echo 'Data Inserted';
                die();
             }
         }
         catch(\Exception $e)
        {
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
