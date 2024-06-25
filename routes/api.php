<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/xmlfile',function(){
    $xmlString = file_get_contents(public_path('import.xml')); 
    $xmlObject = simplexml_load_string($xmlString); 

    $json = json_encode($xmlObject); 
    $phpArray = json_decode($json, true);  
    return response()->json([
       'data'=>$phpArray,
    ]);
    
    // dd($phpArray); 
});