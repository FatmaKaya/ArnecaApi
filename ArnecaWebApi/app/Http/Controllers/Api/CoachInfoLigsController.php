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
        $coach_info_ligs=coach_info_ligs::all();
        $jsoncoachinfoligs = array();

        foreach($coach_info_ligs as $coach_info_lig){

            $notification = $coach_info_lig->getNotifications;
            
            $workout_plan = $coach_info_lig->getWorkout_plan;
            $jsonworkout_plans = array();
    
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
                $set=$match->getSets;

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
                    "skor"=>$match->skor, 
                    "sets"=>[
                        $set->set1,
                        $set->set2,
                        $set->set3,
                        $set->set4
                    ]
                ]  ;            
                $jsonmatches[] = $rowmatches;    
            }

            $rowcoachinfoligs  = [
                "id"=>$coach_info_lig->id,
                "notifications"=> [
                    $notification->bildirim1,
                    $notification->bildirim2,
                    $notification->bildirim3,
                    $notification->bildirim4,
                    $notification->bildirim5,
                    $notification->bildirim6,
                    $notification->bildirim7,
                    $notification->bildirim8,
                ] ,
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
        coach_info_ligs::create([
           
            'lastMatch'=>$request->lastMatch,
            'workout_plan_id'=>$request->workout_plan_id
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
     * @param  \App\Models\coach_info_ligs  $coach_info_ligs
     * @return \Illuminate\Http\Response
     */
    public function show(coach_info_ligs $coach_info_lig)
    {
        $jsoncoachinfoligs = array();
        $workout_plan = $coach_info_lig->getWorkout_plan;
        $jsonworkout_plans = array();
        $notification = $coach_info_lig->getNotifications;

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
            $set=$match->getSets;
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
                "skor"=>$match->skor,
                "sets"=>[
                    $set->set1,
                    $set->set2,
                    $set->set3,
                    $set->set4
                ]
            ]  ;            
            $jsonmatches[] = $rowmatches;    
        }


        $jsoncoachinfoligs[] = [
            "id"=>$coach_info_lig->id,
            "notifications"=> [
                $notification->bildirim1,
                $notification->bildirim2,
                $notification->bildirim3,
                $notification->bildirim4,
                $notification->bildirim5,
                $notification->bildirim6,
                $notification->bildirim7,
                $notification->bildirim8,
            ] ,
            "lastMatch"=>$coach_info_lig->lastMatch,
            "workout_plan"=>$jsonworkout_plans,
            "matches"=>$jsonmatches
         ]  ;

        $result=[
            "coach_info_ligs"=>$jsoncoachinfoligs
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
    public function destroy(coach_info_ligs $coach_info_lig)
    {
        $coach_info_lig->delete();
        $result=[
            "coach_info_lig"=>$coach_info_lig->id
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
