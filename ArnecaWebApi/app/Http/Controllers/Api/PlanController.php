<?php

namespace App\Http\Controllers\Api;

use App\Models\plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $plans=plan::all();
        $json = array();
        foreach($plans as $plan){
            $row = [
                "id"=>$plan->id,
                "day_month"=>$plan->day_month,
                "hours"=>$plan->hours,
                "name"=>$plan->name,
                "location"=>$plan->location,
            ]  ;            
            $json[] = $row;    
        }

        $result=[
            "plan"=>$json
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
        plan::create([
           
            'day_id'=>$request->day_id,
            'day_month'=>$request->day_month,
            'hours'=>$request->hours,
            'name'=>$request->name,
            'location'=>$request->location
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
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(plan $plan)
    {
        $json = array();
        $json[] = [
            "id"=>$plan->id,
            "day_month"=>$plan->day_month,
            "hours"=>$plan->hours,
            "name"=>$plan->name,
            "location"=>$plan->location,
        ]  ;   
        $result=[
            "plan"=>$json
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
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(plan $plan)
    {
        $plan->delete();
        $result=[
            "plan"=>$plan->id
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
