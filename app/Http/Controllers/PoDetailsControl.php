<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\poDetails; 
use App\po_list;
use App\ReceivingDetails; 
use App\ReceivingList;
use Illuminate\Support\Facades\DB;


class PoDetailsControl extends Controller
{
    public function store(Request $request) 
    {
        $input = $request->all();
         //----for taging to specific user/s
         $UserIn=getUser()->id;
         $UserCoCode=getUser()->CoCode;
         //---------------

        $request->validate([
        'PO'=>'required',
        'PO_total'=>'required',
        ]);

        $PO = po_list::updateOrCreate(['PO'=> $input['PO']],[
        'id'=> null,
        'PO'=> $input['PO'],
        'Total_Amount'=>$input['PO_total'],
        'Created_by'=>$UserIn,
        'Status'=>$input['status'],
        'Reviewed_by'=>null,
        'Vendor'=>$input['Vendor'],
        'Ship_to'=>$input['Ship_to'],
        //----taging to specific user/s
        'user_id' => $UserIn,
        'CoCode' => $UserCoCode,
        //---------------
        ]);
        
        $countarray = count($input['po_items'])-1;
        //dd($countarray);
        
        DB::table('po_details')->where('PO',$input['PO'])->delete();

            for($i=0;$i<=$countarray;$i++){          
                     $newData = poDetails::updateOrCreate([
                        'Icode' => $input['po_items'][$i]['Icode'],
                        'PO' => $input['PO']
                     ],[
                    'Icode' => $input['po_items'][$i]['Icode'],
                    'Qty' => $input['po_items'][$i]['Qty'],
                    'UnitCost' => $input['po_items'][$i]['UnitCost'],
                    'PO' => $input['PO'],
                    
        ]);
        
                    $newData->save();
                   
                } $PO->save();

}


public function LoadPo(){
    $Cocode=getUser()->CoCode;
    $po=DB::table('po_lists')
    ->where('CoCode', '=', $Cocode)
    ->get();
    return $po;
}

public function GetPo(Request $request){
    $PO= DB::connection('mysql')->select("SELECT * FROM `po_details` where PO=?",[$request['PO']]);
    return $PO;
}

public function GetPoReceived(Request $request){
    //----for taging to specific user/s
    $UserIn=getUser()->id;
    $UserCoCode=getUser()->CoCode;
    //---------------
    $search=DB::table('po_lists')
    
    ->join('po_details', 'po_details.PO', '=', 'po_lists.PO')
    ->join('companies', 'po_lists.CoCode', '=', 'companies.CoCode')
    ->join('items', 'items.Code', '=', 'po_details.Icode')
        
    ->where('po_lists.CoCode', $UserCoCode)
    ->where('po_lists.PO', $request['PO'])

    ->select(
             'po_details.Qty as expected',
             'po_details.*',
             'po_lists.*',
             'items.Name',
             'items.Unit',
    )
    ->get();

    
    return $search;
}


public function GetPoHead(Request $request){
    $PO= DB::connection('mysql')->select("SELECT * FROM `po_lists` where PO=?",[$request['PO']]);
    return $PO;
}

public function DeleteItem(Request $request){
        $input = $request->all();
}

public function ChangeStatus(Request $request){
    $input = $request->all();
        //dd($input['PO']);
        $UserIn=getUser()->id;
        
        $request->validate([
        'PO'=>'required',
        'Status'=>'required',
        ]);

        $PO = DB::table('po_lists')
        ->where('PO',$input['PO'])
        ->update(['Status'=>$input['Status']],['Reviewed_by'=>$UserIn]);
        
}
}