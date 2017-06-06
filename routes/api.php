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
Route::group( []  ,function(){
    Route::post('marketList', 'MarketController@listCreate');
    Route::get('marketList/{firstId?}/{name?}/{type?}/{idol?}/{cost?}/{skillPower?}/{line?}/{candyOrDrink?}/{page?}', 'MarketController@firstNewList');
});


