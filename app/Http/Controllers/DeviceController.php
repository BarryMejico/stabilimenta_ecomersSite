<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cusstomer_Device;

use Illuminate\Support\Facades\DB;
class DeviceController extends Controller
{
    public function SaveCusDevice(request $REQUEST){
        //$input=$REQUEST->all();
        //dd($REQUEST[0]);
        $REQUEST->validate([
            'Code' => ['required', 'string','unique:cusstomer__devices'],
            'DeciveName' => ['required', 'string'],
            'Model' => ['required', 'string'],
            'Ccode' => ['required', 'string'],
        ]);

        $Device = Cusstomer_Device::create([
            'Code'=> $REQUEST['Code'],
            'DeciveName'=>$REQUEST['DeciveName'],
            'Model'=>$REQUEST['Model'],
            'Ccode'=>$REQUEST['Ccode'],
            ]);
            $Device->save();

            $Device = Cusstomer_Device::where('Code',$REQUEST['Code'])->get();
            return $Device;
        
    }

    public function GetCusDevice(Request $request){
        $PO= DB::connection('mysql')->select("SELECT * FROM `cusstomer__devices` where Ccode=?",[$request['ccode']]);
        //dd($request);
        return $PO;
    }
}
