<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function menu(){
        // $permCode=getUser()->permCode;
        //     $Menu= DB::table('permission_details')
        //     ->join('menus', 'menus.id', '=', 'permission_details.id')
        //     ->where('permission_details.permCode',$permCode)
        //     ->select('menus.*')
        //     ->get();
        $menus=listofmenu();
            return $menus;
    }

    public function menufor(Request $request){
        $permCode=$request->selected;
            $Menu= DB::table('permission_details')
            ->join('menus', 'menus.id', '=', 'permission_details.id')
            ->where('permission_details.permCode',$permCode)
            ->select('menus.*')
            ->get();
            //listofmenu().$menus=$Menu;
            //dd(listofmenu());
            return $Menu;
    }

    public function allmenu(){
        $Menu= DB::table('menus')
        ->get();
        return $Menu;
}
}
