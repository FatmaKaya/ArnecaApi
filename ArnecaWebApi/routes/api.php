<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::apiResource('locations','Api\LocationsController');
Route::apiResource('matches','Api\MatchesController');

Route::apiResource('plan','Api\PlanController');
Route::apiResource('days','Api\DaysController');
Route::apiResource('weeks','Api\WeeksController');
Route::apiResource('month','Api\MonthController');
Route::apiResource('workout_plan','Api\WorkoutPlansController');

Route::apiResource('coach_info_ligs','Api\CoachInfoLigsController');

//Route::apiResource('coachinfoligs','Api\CoachInfoLigsController');