<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function menu(){
            $Menu= DB::table('permission_details')
            ->join('menus', 'menus.id', '=', 'permission_details.id')
            ->select('menus.*')
            ->get();
            return $Menu;
    }

    public function allmenu(){
        $Menu= DB::table('menus')
        
        ->get();
        return $Menu;
}
}
