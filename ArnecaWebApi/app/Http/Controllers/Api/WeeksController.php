<?php

namespace App\Http\Controllers\Api;

use App\Models\weeks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeeksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weeks=weeks::all();
        $jsonweeks = array();
        
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

            $rowweeks = [
                "id"=>$week->id,
                "name"=>$week->name,
                "days"=> $jsondays
            ]  ;            
            $jsonweeks[] = $rowweeks;    
        }

        $result=[
            "weeks"=>$jsonweeks
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
     * @param  \App\Models\weeks  $weeks
     * @return \Illuminate\Http\Response
     */
    public function show(weeks $week)
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
        $jsonweeks[] =[
            "id"=>$week->id,
            "name"=>$week->name,
            "days"=> $jsondays
        ]  ;     

        $result=[
            "week"=>$jsonweeks
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
     * @param  \App\Models\weeks  $weeks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, weeks $weeks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\weeks  $weeks
     * @return \Illuminate\Http\Response
     */
    public function destroy(weeks $weeks)
    {
        $weeks->delete();
        $result=[
            "location"=>$weeks
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
