<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VendorModel;
use Illuminate\Support\Facades\App;
use App\Helper\Ucode;
use App\Ucode\Ucode as UcodeUcode;
use Illuminate\Support\Facades\DB;
use App\Rules\inUseData;

class VendorController extends Controller
{
    public function index(){
       $Cocode=getUser()->CoCode;
        $Vendors=DB::table('vendor_models')
        ->where('CoCode', '=', $Cocode)
        ->get();
        return $Vendors;
        
    }

    public function indexPagination(){
        $Cocode=getUser()->CoCode;
        $Vendors=DB::table('vendor_models')
        ->where('CoCode', '=', $Cocode)
        ->paginate(5);
        return $Vendors;
    }

      public function store(Request $request){        
        $request->validate([
            'Name'=>'required',
            'Number'=>'required',
            'Address'=>'required'  
        ]);
        $input = $request->all();
        $Code=Ucode();
         //----for taging to specific user/s
         $UserIn=getUser()->id;
         $UserCoCode=getUser()->CoCode;
         //---------------
        $Vendor = VendorModel::updateOrCreate([
            'Vendor'=> $input['Name'],
            'Number'=> $input['Number'],
            'Address'=> $input['Address'], 
            'Vcode'=>$Code,
            //----taging to specific user/s
            'user_id' => $UserIn,
            'CoCode' => $UserCoCode,
            //---------------
        ]);
        $Vendor->save(); 
    }
    
    public function update(Request $request){        
        $request->validate([
            'Name'=>'required',
            'Number'=>'required',
            'Address'=>'required'  
        ]);

        $input = $request->all();
        $Code=Ucode();
        //dd($input);

        $customer = VendorModel::where('Vcode',$input['ids'])
        ->update([
           'Vendor'=> $input['Name'],
           'Number'=> $input['Number'],
           'Address'=> $input['Address'],
        ]);
        
    }

    public function Delete(Request $request){  
        $input = $request->all();

        $request->validate([
            'Vcode'=>['required', new inUseData],
        ]);
        $customer = VendorModel::where('Vcode',$input['Vcode'])->delete();
    }   
                                      
    public function Search(Request $request){
        $input = $request->all();
        //$search = VendorModel::find($input['Search']);
        $s= $input['Search'];
        $Cocode=getUser()->CoCode;
        $search = DB::table('vendor_models')
                ->where('Vendor', 'like', "%{$s}%")
                ->where('CoCode', '=', $Cocode)
                ->get();
        
        //dd($input);
        return $search;
    }
}
