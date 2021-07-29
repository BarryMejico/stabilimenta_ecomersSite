<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\permission;
use App\permission_detail;
use App\Employee;
use App\User;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function addpermision(Request $request){
        $Code=Ucode();
        $UserCoCode=getUser()->CoCode;

        $input = $request->all();
            
            $customer = permission_detail::
            where('permCode',$input['params']['permCode'])
            ->delete();

        $permission = permission::Create([
            'permCode'=>$Code,
            'Description'=>$Code,
            ]);
            $permission->save();
            return $Code;
    }

    public function addpermisionDetails(Request $request){
        $input = $request->all();
        $UserCoCode=getUser()->CoCode;
        
        $D = permission_detail::Create([
            'permCode'=>$input['params']['perma'],
            'id'=>$input['params']['id'],
            'CoCode'=> $UserCoCode,
            ]);
            $D->save();
            return $input;
    }

    public function activePermaCode(Request $request){
   //----for taging to specific user/s
   $UserIn=getUser()->id;
   $UserCoCode=getUser()->CoCode;
   //---------------

        $input = $request->all();
        $PO = DB::table('users')
        ->where('id',$input['params']['id'])
        ->update(['permCode'=>$input['params']['permCode']]);

        $PO = DB::table('employees')
        ->where('id',$input['params']['id'])
        ->where('CoCode',$UserCoCode)
        ->update(['permCode'=>$input['params']['permCode']]);
    }
}
