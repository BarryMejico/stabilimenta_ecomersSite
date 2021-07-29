<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class cookiemanster extends Controller
{
    public function makeCookie(Request $request){
    $minutes=60 * 24 * 365 * 10;
    //dd($request->all());
    $data=$request->all();
    $cookies=json_encode($data);

       return response('x')->withCookie(cookie()->forever( 'data',$cookies, $minutes));

   }

    public function getCookie(Request $request){
        $value = $request->cookie('data');
        $convertTojson=json_decode($value);
        return $convertTojson;    
    }
}
