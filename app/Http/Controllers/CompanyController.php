<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function SaveCompany(Request $res){
      
        $res->validate([
            'CompanyName' => 'required',
            'CompanyAddress' => 'required',
            'CompanyOwner' => 'required',
        ]);

        // dd($res->c);
        $input=$res->all();
        // dd($input);
        $Code=Ucode();

        $company = Company::create([
            'CoCode'=>$Code,
            'CompanyName'=>$input['CompanyName'],
            'CompanyAddress'=>$input['CompanyAddress'],
            'CompanyOwner' =>$input['CompanyOwner'],
            ]);

            
            
            $company->save();

            $UserIn=getUser()->id;
       
            $User = User::where('id',$UserIn)
            ->update([
               'CoCode'=> $Code,
            ]);
    }

    public function setCompany(Request $res){

        $input=$res->all();
        $UserIn=getUser()->id;
       
            $User = User::where('id',$UserIn)
            ->update([
               'CoCode'=> $input['CoCode'],
            ]);

            return $User;
    }

    public function getCompany(Request $res){
        //$company= DB::connection('mysql')->select("SELECT * FROM `companies` where CoCode=?",[$res['CoCode']]);
        //dd($request);
        $company = Company::where('CoCode',$res['CoCode'])
                        ->get();
        return $company;
    }
}
