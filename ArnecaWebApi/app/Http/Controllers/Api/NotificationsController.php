<?php

namespace App\Http\Controllers\Api;

use App\Models\notifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications=notifications::all();

        $jsonnotifications = array();

        foreach($notifications as $notification){

            $rownotifications = [
                $notification->bildirim1,
                $notification->bildirim2,
                $notification->bildirim3,
                $notification->bildirim4,
                $notification->bildirim5,
                $notification->bildirim6,
                $notification->bildirim7,
                $notification->bildirim8,
            ]  ;            
            $jsonnotifications[] = $rownotifications;    
        }
 

        $result=[
            "notifications"=>$jsonnotifications
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
        notifications::create([
           
            'coache_info_ligs_id'=>$request->coache_info_ligs_id,
            'bildirim1'=>$request->bildirim1,
            'bildirim2'=>$request->bildirim2,
            'bildirim3'=>$request->bildirim3,
            'bildirim4'=>$request->bildirim4,
            'bildirim5'=>$request->bildirim5,
            'bildirim6'=>$request->bildirim6,
            'bildirim7'=>$request->bildirim7,
            'bildirim8'=>$request->bildirim8
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
     * @param  \App\Models\notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function show(notifications $notification)
    {
        $result=[
            "notifications"=> [
                $notification->bildirim1,
                $notification->bildirim2,
                $notification->bildirim3,
                $notification->bildirim4,
                $notification->bildirim5,
                $notification->bildirim6,
                $notification->bildirim7,
                $notification->bildirim8,
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
     * @param  \App\Models\notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notifications $notifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function destroy(notifications $notification)
    {
        $notification->delete();
        $result=[
            "notifications"=>$notification->id
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
