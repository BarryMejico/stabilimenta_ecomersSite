<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function store(Request $request){  
        $input = $request->all();
        //dd($input);      
        $request->validate([
            'Name_'=>'required', 
        ]);

       
        $Code=Ucode();
        $CoCode=getUser()->CoCode;
       
        $Vendor = Employee::Create([
            'Employee'=> $input['Name_'], 
            'Ecode'=>$Code,
            'CoCode'=>$CoCode,
            'Position'=>"Input position",
        ]);
        $Vendor->save();
    }

    public function LoadEmp(){
        $Vendors=Employee::paginate(5);
        //$Vendors=Customer::paginate(5);
        return $Vendors;
}

public function Search(Request $request){
    $input = $request->all();
    //$search = VendorModel::find($input['Search']);
    $s= $input['Search'];
    $search = DB::table('employees')
            ->where('Employee', 'like', "%{$s}%")
            ->paginate(5);
    //dd($search);
    return $search;
}

}
