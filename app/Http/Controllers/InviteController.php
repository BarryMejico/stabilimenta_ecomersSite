<?php

namespace App\Http\Controllers;
use App\invite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InviteController extends Controller
{
   public function saveInvite(Request $REQUEST){
    $UserIn=getUser()->id;
    $UserCoCode=getUser()->CoCode;

    $REQUEST->validate([
        'invite_to'=>'required',
    ]);

    invite::create([
        'invite_to' => $REQUEST['invite_to'],
        'invite_from' => $UserIn,
        'CoCode' => $UserCoCode,
        'invite_Status'=>1,
    ]);
   }

   public function getNotif(){
    $UserIn=getUser()->id;
    $search = DB::table('invites')
    ->join('users', 'invites.invite_from', '=', 'users.id')
    ->join('companies', 'invites.CoCode', '=', 'companies.CoCode')

    ->where('invites.invite_to', '=', $UserIn)
    ->where('invites.invite_Status', '=', 1)

    ->select('users.name',
            'companies.CompanyName',
            'companies.CoCode',
            'invites.id',
            )
    ->get();
    return $search;
   }

   public function accepted(Request $REQUEST){
    $input = $REQUEST->all();
      
    $invite = invite::where('id',$input['id'])
    ->update([
        'invite_Status'=>0,
    ]);
   }
}
