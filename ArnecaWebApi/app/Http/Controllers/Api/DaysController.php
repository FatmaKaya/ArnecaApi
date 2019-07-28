<?php

namespace App\Http\Controllers\Api;

use App\Models\days;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = days::all();
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
                   "location"=>$plan->location,
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

        $result=[
               'days'=>$jsondays
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
     * @param  \App\Models\days  $days
     * @return \Illuminate\Http\Response
     */
    public function show(days $day)
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
                "location"=>$plan->location,
            ]  ;            
            $jsonplans[] = $rowplans;    
        }

        $jsondays = array();
        $jsondays[] = [
            "id"=>$day->id,
            "day_month"=>$day->day_month,
            "plan"=>$jsonplans
        ]  ;   
        
        $result=[
            "plan"=>$jsondays
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
     * @param  \App\Models\days  $days
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, days $days)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\days  $days
     * @return \Illuminate\Http\Response
     */
    public function destroy(days $days)
    {
        $days->delete();
        $result=[
            "days"=>$days
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
