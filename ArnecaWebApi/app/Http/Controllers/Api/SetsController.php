<?php

namespace App\Http\Controllers\Api;

use App\Models\sets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sets=sets::all();

        $jsonsets = array();

        foreach($sets as $set){
            $rowsets = [
                $set->set1,
                $set->set2,
                $set->set3,
                $set->set4,
            ]  ;            
            $jsonsets[] = $rowsets;    
        }
 

        $result=[
            "sets"=>$jsonsets
        ];

        $result_message=[
            "method"=>"Get",
            "method"=>"Get",
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
        sets::create([
           
            'set1'=>$request->set1,
            'set2'=>$request->set2,
            'set3'=>$request->set3,
            'set4'=>$request->set4,
        ]);

        $result_message=[
            "method"=>"post",
            "title"=>"Bilgi",
            "message"=> "Başarılı",
            "type"=>"success"
        ];
        
        return response()->json([
            "result_message"=> $result_message
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sets  $sets
     * @return \Illuminate\Http\Response
     */
    public function show(sets $set)
    {  
        $result=[
            "sets"=> [
                $set->set1,
                $set->set2,
                $set->set3,
                $set->set4
            ] 
        ];

        $result_message=[
            "method"=>"Get",
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
     * @param  \App\Models\sets  $sets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sets $sets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sets  $sets
     * @return \Illuminate\Http\Response
     */
    public function destroy(sets $set)
    {
        $set->delete();
        $result=[
            "sets"=>$set->id
        ];
        
        $result_message=[
            "method"=>"Delete",
            "title"=>"Bilgi",
            "message"=> "Başarılı",
            "type"=>"success"
        ];
        
        return response()->json([
            "result"=>$result,
            "result_message"=> $result_message
        ]);
    }
}
