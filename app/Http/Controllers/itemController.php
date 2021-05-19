<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use Illuminate\Support\Facades\DB;
use App\Rules\inUseData;

class itemController extends Controller
{
    public function SaveItem(Request $REQUEST){
        $input = $REQUEST->all();
        //dd($REQUEST);

        $REQUEST->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Code' => ['required', 'string', 'unique:Items'],
            'Unit' => ['required', 'string'],
        ]);

        //----for taging to specific user/s
        $UserIn=getUser()->id;
        $UserCoCode=getUser()->CoCode;
        //---------------

        item::create([
            'Name' => $REQUEST['Name'],
            'Code' => $REQUEST['Code'],
            'Unit' => $REQUEST['Unit'],
            'status'=>1,
            //----taging to specific user/s
            'user_id' => $UserIn,
            'CoCode' => $UserCoCode,
            //---------------
        ]);
    } 

    public function LoadItems(){
        $Cocode=getUser()->CoCode;
        $items=DB::table('items')
        ->where('CoCode', '=', $Cocode)
        ->get();
        return $items;
    }

    public function LoadItemsPagination(){
        $Cocode=getUser()->CoCode;
        $items=DB::table('items')
        ->where('CoCode', '=', $Cocode)
        ->paginate(5);
        
        return $items;
    }

    public function update(Request $request){        
        $input = $request->all();
        //$Code=Ucode();
        //dd($input);
        
        $request->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Code' => ['required', 'string'],
            'Unit' => ['required', 'string'],
        ]);
 
        $item = item::where('Code',$input['Code'])
        ->update([
        'Name'=> $input['Name'],
        //$item ->Code= $input['Code'];
        'Unit'=> $input['Unit'],
               
        ]);
        
    }

    public function Delete(Request $request){  
        $input = $request->all();
        //dd($input);
        $request->validate([
            'Icode'=>['required', new inUseData],
        ]);
        $Item = item::where('Code',$input['Icode'])->delete();
        
    }   

    public function specificItem(Request $request){
        $details= DB::connection('mysql')->select("SELECT * FROM `items` where Code=?",[$request['code']]);
        
    return $details;
    }

    public function Search(Request $request){
        $input = $request->all();
        $Cocode=getUser()->CoCode;
        $s= $input['Search'];
        $search = DB::table('items')
                ->where('Name', 'like', "%{$s}%")
                ->where('CoCode', '=', $Cocode)
                ->get();
        
        //dd($input);
        return $search;
    }
    
}
