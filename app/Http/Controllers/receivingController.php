<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReceivingDetails; 
use App\ReceivingList;
use App\StocksList;
use App\po_list;
use Illuminate\Support\Facades\DB;

class receivingController extends Controller
{
    public function store(Request $request) 
    {
        $input = $request->all();
        //dd($input);
        
         //----for taging to specific user/s
         $UserIn=getUser()->id;
         $UserCoCode=getUser()->CoCode;
         //---------------
        $countR=ReceivingList::count();
        $ReceivingCode=Ucode() . "-" . strval($countR);

        $request->validate([
        'PO'=>'required',
        'PO_total'=>'required',
        ]);

        $PO = ReceivingList::updateOrCreate(['PO'=> $input['PO']],[
        'PO'=> $input['PO'],
        'Total_Amount'=>$input['PO_total'],
        'Created_by'=>$UserIn,
        'Status'=>'Open',
        'Reviewed_by'=>null,
        'ReceivingCode'=>$ReceivingCode,
        //----taging to specific user/s
        'user_id' => $UserIn,
        'CoCode' => $UserCoCode,
        //---------------
        ]);
        
        $countarray = count($input['po_items'])-1;
         

            for($i=0;$i<=$countarray;$i++){          
                     $newData = ReceivingDetails::updateOrCreate([
                    'Icode' => $input['po_items'][$i]['Icode'],
                    'R_Qty' => $input['po_items'][$i]['Qty'],
                    'UnitCost' => '',
                    'PO' => $input['PO'],
                    'ReceivingCode'=>$ReceivingCode,
                    

        ]);
        $item=DB::table('stocks_lists')
        ->where('Icode', [$input['po_items'][$i]['Icode']])
        ->get();

        $countS=$item->count();
        //DB::table('stocks_lists')->where('Icode',$input['po_items'][$i]['Icode'])->count();
        //dd($item[0]->Qty);

                        if ($countS<=0){
                            $newQTY=
        $updateStocks=StocksList::updateOrCreate([
            'Icode' => $input['po_items'][$i]['Icode'],
            'Qty' => $input['po_items'][$i]['Qty'],
            'UnitCost'=>'',
            'Location'=>'',
            //----taging to specific user/s
            'user_id' => $UserIn,
            'CoCode' => $UserCoCode,
            //---------------
        ]);

                        }else{
                            $newCalQty=$item[0]->Qty + $input['po_items'][$i]['Qty'];
                            $updateStocks=StocksList::updateOrCreate(['Icode' => $input['po_items'][$i]['Icode']],[
                                'Qty' => $newCalQty,
                                'UnitCost'=>'',
                                'Location'=>'',
                                //----taging to specific user/s
                                'user_id' => $UserIn,
                                'CoCode' => $UserCoCode,
                                //---------------
                            ]);

                        }
        
                    $newData->save();
                    $updateStocks->save();
                   
                } $PO->save();

                // $status = DB::table('po_lists')
                // ->where('PO',$input['PO'])
                // ->update(['Status'=>"Done"],['Reviewed_by'=>$UserIn]);

}


public function ChangeStatus(Request $request){
        $input = $request->all();

        $UserIn=getUser()->id;
        
        $request->validate([
        'PO'=>'required',
        'Status'=>'required',
        ]);

        $PO = DB::table('po_lists')
        ->where('PO',$input['PO'])
        ->update(['Status'=>$input['Status']],['Reviewed_by'=>$UserIn]);
        
}

public function item(Request $request){
    $input = $request->all();
    //dd($input);
    $stocks = StocksList::where('ICode',$input['Code'])->get();
    return $stocks;
}

public function stocks(){
    $Cocode=getUser()->CoCode;
    $stocks=DB::table('stocks_lists')
    ->where('CoCode', '=', $Cocode)
    ->get();
    return $stocks;
}

public function ReceivedItems(Request $request){
    //----for taging to specific user/s
    $UserIn=getUser()->id;
    $UserCoCode=getUser()->CoCode;
    //---------------
    $search=DB::table('receiving_details')
    
    ->where('receiving_details.PO', $request['PO'])
    ->select('Icode',
        DB::raw('SUM(receiving_details.R_Qty) as received')
    )

    ->groupBy('receiving_details.Icode')
    ->get();

    return $search;
}



}
