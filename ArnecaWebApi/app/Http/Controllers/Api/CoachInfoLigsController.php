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
        
            foreach($workout_plans as $workout_plan)
            {
                $months = $workout_plan->getMonths;

                foreach($months as $month)
                {
                    $weeks = $month->getWeeks;

                    foreach($weeks as $week)
                    {
                        $days = $week->getdays;
                        $jsondays = array();

                        foreach($days as $day)
                        {
                            $plans= $day->getPlan;
                            $jsonplans = array();

                            foreach($plans as $plan)
                            {
                                $rowplans= [
                                    "id"=>$plan->id,
                                    "day_month"=>$plan->day_month,
                                    "hours"=>$plan->hours,
                                    "name"=>$plan->name,
                                    "location"=>$plan->location
                                ]  ;
                                $jsonplans[] = $rowplans;
                            }
                    
                            $rowdays = [
                                "id"=>$day->id,
                                "day_month"=>$day->day_month,
                                "plan"=>$jsonplans
                            ]  ;
                            $jsondays[] = $rowdays;
                        }
                        $rowweeks = [
                            "id"=>$week->id,
                            "name"=>$week->name,
                            "days"=> $jsondays
                        ]  ;
                        $jsonweeks[] = $rowweeks;
                    }
            
                    $rowmonths = [
                        "id"=>$month->id,
                        "name"=>$month->name,
                        "weeks"=> $jsonweeks
                    ]  ;            
                    $jsonmonths[] = $rowmonths;   
                }

                $rowworkout_plans = [
                    "id"=>$workout_plan->id,
                    "name"=>$workout_plan->name,
                    "month"=> $jsonmonths
                ]  ;    

                $jsonworkout_plans[] = $rowworkout_plans;   
            }


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
        
        foreach($workout_plans as $workout_plan)
        {
            $months = $workout_plan->getMonths;

            foreach($months as $month)
            {
                $weeks = $month->getWeeks;

                foreach($weeks as $week)
                {
                    $days = $week->getdays;
                    $jsondays = array();

                    foreach($days as $day)
                    {
                        $plans= $day->getPlan;
                        $jsonplans = array();

                        foreach($plans as $plan)
                        {
                            $rowplans= [
                                "id"=>$plan->id,
                                "day_month"=>$plan->day_month,
                                "hours"=>$plan->hours,
                                "name"=>$plan->name,
                                "location"=>$plan->location
                            ]  ;
                            $jsonplans[] = $rowplans;
                        }
                
                        $rowdays = [
                            "id"=>$day->id,
                            "day_month"=>$day->day_month,
                            "plan"=>$jsonplans
                        ]  ;
                        $jsondays[] = $rowdays;
                    }
                    $rowweeks = [
                        "id"=>$week->id,
                        "name"=>$week->name,
                        "days"=> $jsondays
                    ]  ;
                    $jsonweeks[] = $rowweeks;
                }
        
                $rowmonths = [
                    "id"=>$month->id,
                    "name"=>$month->name,
                    "weeks"=> $jsonweeks
                ]  ;            
                $jsonmonths[] = $rowmonths;   
            }

            $rowworkout_plans = [
                "id"=>$workout_plan->id,
                "name"=>$workout_plan->name,
                "month"=> $jsonmonths
            ]  ;    

            $jsonworkout_plans[] = $rowworkout_plans;   
        }


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
        //
    }
}
