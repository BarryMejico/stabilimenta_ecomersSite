<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locaion;

class LocationController extends Controller
{
    public function treedata(){
        $datatree= Locaion::all();
        return $datatree;
    }

    public function Save(Request $request){
        $input = $request->all();
        
        $count = Locaion::where('parent',$input['parent'])->count();
        $newCode=$input['parent'] . "-" . $count;
        //dd($newCode);
        $request->validate([
            'name'=>'required',
            'parent'=>'required'  
        ]);
            
        $Node = Locaion::updateOrCreate(['code'=> $newCode],[
            'code'=> $newCode,
            'name'=> $input['name'],
            'parent'=> $input['parent'], 
        ]);
    }

}
