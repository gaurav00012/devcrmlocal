<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jsonString = '{"Raw Data":"245 0 1 0 9 2 0 0 0 0 0 0 7 0 0 245 0 10 0 6 2 0 0 0 0 0 0 7 0 0 245 0 15 0 9 2 0 0 0 0 0 0 7 0 0 245 0 18 0 9 2 0 0 0 0 0 0 7 0 0 245 0 34 0 5 0 0 0 0 0 0 0 3 0 0 69 78 68"}';
        $json=json_decode($jsonString,true);
        $rawData = $json['Raw Data'];
        $explodeEndpoint = explode('69 78 68',$rawData);
        $explodeMeterReading = explode('245',$explodeEndpoint[0]);
        echo '<pre>';
        print_r($explodeEndpoint);
        echo '</pre>';
        echo '<pre>';
        print_r($explodeMeterReading);
        echo '</pre>';
        for($i = 1; $i < sizeof($explodeMeterReading); $i++)
        {
            echo '<pre>';
            print_r (explode(' ',$explodeMeterReading[$i]));
            echo '</pre>';
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
