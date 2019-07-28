<?php

namespace App\Http\Controllers\Api;

use App\Models\month;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months=month::all();
        $jsonmonths = array();
        
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
        
        $result=[
            "months"=>$jsonmonths
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\month  $month
     * @return \Illuminate\Http\Response
     */
    public function show(month $month)
    {
        $jsonmonths = array();
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
         
         $jsonmonths[] = [
             "id"=>$month->id,
             "name"=>$month->name,
             "weeks"=> $jsonweeks,
         ]  ;  

        $result=[
            "month"=>$jsonmonths
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
     * @param  \App\Models\month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, month $month)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\month  $month
     * @return \Illuminate\Http\Response
     */
    public function destroy(month $month)
    {
        $month->delete();
        $result=[
            "month"=>$month->id
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
