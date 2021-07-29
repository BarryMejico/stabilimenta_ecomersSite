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

   public function companies(){
   //----for taging to specific user/s
   $UserIn=getUser()->id;
   $UserCoCode=getUser()->CoCode;
   //---------------
    $companies=DB::table('employees')
                ->Join('companies','companies.CoCode','=','employees.CoCode')
                ->leftJoin('users','users.id','=','companies.CompanyOwner')
                ->where('employees.id', $UserIn)
                ->select('companies.CompanyName',
                         'companies.CompanyAddress',
                         'users.name',
                         'users.name',
                         'employees.CoCode',
                         'employees.permCode',
                )
                ->get();
    return $companies;
   }

    public function getCompany(Request $res){
        $company = Company::where('CoCode',$res['CoCode'])
                        ->get();
        return $company;
    }

    public function changeCompany(Request $request){
         //----for taging to specific user/s
        $UserIn=getUser()->id;
        $UserCoCode=getUser()->CoCode;
        //---------------
        $input = $request->all();

        $PO = DB::table('users')
        ->where('id',$UserIn)
        ->update([
            'permCode'=>$input['params']['permCode'],
            'CoCode'=>$input['params']['CoCode'],
    
    ]);
    }
}
