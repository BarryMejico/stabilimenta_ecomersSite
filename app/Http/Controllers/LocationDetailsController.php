<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\locationDetails;
use App\item;
use Illuminate\Support\Facades\DB;

class LocationDetailsController extends Controller
{
    public function save(Request $request){
        $request->validate([
            'itemCode'=>'required',
            'parent'=>'required'  
        ]);

        locationDetails::create([
            'itemCode'=>$request['itemCode'],
            'parent'=>$request['parent'],
        ]);
        $item = DB::connection('mysql')->select("UPDATE `items` SET `status`=1 WHERE Code=?",[$request['itemCode']]);
    }

    public function SelectedParent(Request $request)
    {
        $child= DB::connection('mysql')->select("SELECT * FROM `location_details` where parent=?",[$request['parent']]);
    //dd($PO);
    return $child;
    }
}
