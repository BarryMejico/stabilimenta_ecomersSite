<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\DB;
use App\Rules\inUseData;

class CustommerController extends Controller
{
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
        
        $Vendor = Customer::updateOrCreate([
            'Customer'=> $input['Name'],
            'Number'=> $input['Number'],
            'Address'=> $input['Address'], 
            'Ccode'=>$Code,
            //----taging to specific user/s
            'user_id' => $UserIn,
            'CoCode' => $UserCoCode,
            //---------------
        ]);
        $Vendor->save();

        // $customer = Customer::where('Ccode',$Code)->get();
        $customer=array(
            "Address"=>$input['Address'],
            "Ccode"=>$Code,
            "Customer"=>$input['Name'],
            "Number"=>$input['Number'],
        );

        return $customer;
    }

    public function Delete(Request $request){  
        $input = $request->all();
        //dd($input);
        $request->validate([
            'Ccode'=>['required', new inUseData],
        ]);
        $customer = Customer::where('Ccode',$input['Ccode'])->delete();
    }   

    public function update(Request $request){        
        $request->validate([
            'Name'=>'required',
            'Number'=>'required',
            'Address'=>'required'  
        ]);

        $input = $request->all();
       
        $customer = Customer::where('Ccode',$input['ids'])
        ->update([
           'Customer'=> $input['Name'],
           'Number'=> $input['Number'],
           'Address'=> $input['Address'],
        ]);
    }


    public function LoadCus(){
        $Cocode=getUser()->CoCode;
        $Vendors=DB::table('customers')
        ->where('CoCode', '=', $Cocode)
        ->get();
        return $Vendors;
    }

    public function LoadlistCus(){
        $Cocode=getUser()->CoCode;
        $Vendors=DB::table('customers')
        ->where('CoCode', '=', $Cocode)
        ->get();
        return $Vendors;
}

    public function LoadCusPagination(){
        $Cocode=getUser()->CoCode;
        $Vendors=DB::table('customers')
        ->where('CoCode', '=', $Cocode)
        ->paginate(5);
        return $Vendors;
}

    public function Search(Request $request){
        $input = $request->all();
        $Cocode=getUser()->CoCode;
        
        $s= $input['Search'];
        $search = DB::table('customers')
                ->where('Customer', 'like', "%{$s}%")
                ->where('CoCode', '=', $Cocode)
                
                ->paginate(5);
        return $search;
    }
}
