<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class cookiemanster extends Controller
{
    public function makeCookie(Request $request){
        $minutes=1;
       return response('Hello World')->cookie(
           'color', 'Red', $minutes
       );
   }

    public function getCookie(Request $request){
        $value = $request->cookie('color');
        return $value;    
    }
}
