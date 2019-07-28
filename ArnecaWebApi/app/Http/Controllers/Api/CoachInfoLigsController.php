<?php

namespace App\Http\Controllers\Api;

use App\Models\coach_info_ligs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoachInfoLigsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coachinfoligs=coach_info_ligs::all();
        $jsoncoachinfoligs = array();
       
        foreach($coachinfoligs as $coach_info_lig)
        {
            $workout_plans = $coach_info_lig->getWorkout_plan;
            $jsonworkout_plans = array();
        
          

            $matches = $coach_info_lig->getMatches;
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


            $rowcoachinfoligs = [
                "id"=>$coach_info_lig->id,
                "lastMatch"=>$coach_info_lig->lastMatch,
                "workout_plan"=>$jsonworkout_plans,
                "matches"=>$jsonmatches
             ]  ;    
 
             $jsoncoachinfoligs[] = $rowcoachinfoligs; 

        }

        $result=[
            "coach_info_ligs"=>$jsoncoachinfoligs
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
     * @param  \App\Models\coach_info_ligs  $coach_info_ligs
     * @return \Illuminate\Http\Response
     */
    public function show(coach_info_ligs $coach_info_lig)
    {
        $jsoncoachinfoligs = array();
        $workout_plans = $coach_info_lig->getWorkout_plan;
        $jsonworkout_plans = array();
        
        

        $matches = $coach_info_lig->getMatches;
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


        $jsoncoachinfoligs[] = [
            "id"=>$coach_info_lig->id,
            "lastMatch"=>$coach_info_lig->lastMatch,
            "workout_plan"=>$jsonworkout_plans,
            "matches"=>$jsonmatches
         ]  ;

        $result=[
            "coach_info_ligs"=>$jsoncoachinfoligs
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
     * @param  \App\Models\coach_info_ligs  $coach_info_ligs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coach_info_ligs $coach_info_ligs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coach_info_ligs  $coach_info_ligs
     * @return \Illuminate\Http\Response
     */
    public function destroy(coach_info_ligs $coach_info_ligs)
    {
        $coach_info_ligs->delete();
        $result=[
            "location"=>$coach_info_ligs
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
