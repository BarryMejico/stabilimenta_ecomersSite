<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function getUser(Request $res){
        $user= DB::connection('mysql')->select("SELECT * FROM `users` where email=? OR id=?",[$res['sUser'],$res['sUser']]);
        //dd($request);
        return $user;
    }
}
