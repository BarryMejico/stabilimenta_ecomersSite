<?php 

if (!function_exists('custom')) {
    
    function Ucode() {
        $d = date("yy-m-dHs");
        $rand=rand(10,100);
        $code = $d.$rand;
        return $code;
}

function getUser(){
    return auth()->user();
}

function PO_details(){
$PO_detail=array(
        "icode",
        "idescription",
        "iunit",
        "Qty",
        "Ucost",
        "Tcost"
);

}



 }

