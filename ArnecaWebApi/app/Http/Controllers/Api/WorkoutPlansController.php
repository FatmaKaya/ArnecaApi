<?php

namespace App\Http\Controllers\Api;

use App\Models\workout_plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkoutPlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workout_plans=workout_plan::all();
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

        $result=[
            "workout_plan"=>$jsonworkout_plans
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
     * @param  \App\Models\workout_plan  $workout_plan
     * @return \Illuminate\Http\Response
     */
    public function show(workout_plan $workout_plan)
    {
        $jsonworkout_plan = array();
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
        
        $jsonworkout_plan[]  = [
            "id"=>$workout_plan->id,
            "name"=>$workout_plan->name,
            "month"=> $jsonmonths
         ]  ;

        $result=[
            "workout_plan"=>$jsonworkout_plan
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
     * @param  \App\Models\workout_plan  $workout_plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, workout_plan $workout_plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\workout_plan  $workout_plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(workout_plan $workout_plan)
    {
        //
    }
}
