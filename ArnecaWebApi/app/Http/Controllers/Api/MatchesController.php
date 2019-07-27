<?php

namespace App\Http\Controllers\Api;

use App\Models\matches;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = matches::all();
        $jsonmatches = array();
        
        foreach($matches as $match)
        {
            $rowmatches = [
                "id"=>$match->id,
                "title"=>$match->title,
                "lig"=>$match->lig,
                "date"=>$match->date,
                "time"=>$match->time,
                "dateRaw"=>$match->dateRaw,
                "order"=>$match->order,
                "yer"=>$match->yer,
                "location"=>$match->getLocation,
                "takimA"=>$match->takimA,
                "takimB"=>$match->takimB,
                "imgA"=>$match->imgA,
                "imgB"=>$match->imgB,
                "skor"=>$match->skor
            ]  ;            
            $jsonmatches[] = $rowmatches;    
        }

        $result=[
               'matches'=>$jsonmatches
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
     * @param  \App\Models\matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function show(matches $match)
    {
        $json = array();
        $json[]= [
            "id"=>$match->id,
            "title"=>$match->title,
            "lig"=>$match->lig,
            "date"=>$match->date,
            "time"=>$match->time,
            "dateRaw"=>$match->dateRaw,
            "order"=>$match->order,
            "yer"=>$match->yer,
            "location"=>$match->getLocation,
            "takimA"=>$match->takimA,
            "takimB"=>$match->takimB,
            "imgA"=>$match->imgA,
            "imgB"=>$match->imgB,
            "skor"=>$match->skor
        ]  ; 
           
        $result=[
            'match'=>$json
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
     * @param  \App\Models\matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, matches $matches)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\matches  $matches
     * @return \Illuminate\Http\Response
     */
    public function destroy(matches $matches)
    {
        //
    }
}