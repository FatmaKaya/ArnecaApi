<?php

namespace App\Http\Controllers\Api;

use App\Models\location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $result=[
            "locations"=>location::all()
        ];

        $result_message=[
            "title"=>"Bilgi",
            "message"=> "Başarılı",
            "type"=>"success"
        ];
    
        return response()->json([
            "result"=>$result,
            "result_message"=> $result_message
        ]);
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
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(location $location)
    {
        $result=[
            "location"=>location::find($location)
        ];

        $result_message=[
            "title"=>"Bilgi",
            "message"=> "Başarılı",
            "type"=>"success"
        ];
    
        return response()->json([
            "result"=>$result,
            "result_message"=> $result_message
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(location $location)
    {
        //
    }
}
