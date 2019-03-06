<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use File;
use Maatwebsite\Excel\Facades\Excel;
use App\MasterCode;
use App\GroupMasterCode;
use App\Purchasing;
use App\DetailPurchasing;

class StockController extends Controller
{
    public function home(){

    	return view ('home');

    }

    public function master_code(){
    	$masterCode = DB::table('master_code')
		->select('master_code.item_code','master_code.item_name','group_master_code.name_group','master_code.uom')
		->join('group_master_code','master_code.id_group','=','group_master_code.id_group')
		->get();
    	$groupMasterCode = GroupMasterCode::orderBy('name_group')->get();
    	return view ('master_code' , compact('groupMasterCode', 'masterCode'));

    }

    public function master_code_store(Request $request){

    	$check = MasterCode::where('item_code', '=', Input::get('itemCode'))->first();
			if ($check == null) {
			   	$addItem = new MasterCode();
		    	$addItem->item_code = $request->itemCode;
		    	$addItem->item_name = $request->itemName;
		    	$addItem->id_group = $request->itemGroup;
		    	$addItem->uom = $request->itemUom;

    			$addItem->save();
    			return redirect()->back()->with('message1', 'Item Added!');
			}else{
				return redirect()->back()->with('message', 'Error! Detected Same Item!');
			}

    	

    }


    public function group_master_code(){

        return view('group_master_code');

    }

    public function group_master_code_store(Request $request){

        $check = GroupMasterCode::where('name_group', '=', Input::get('nameGroup'))->first();
        if ($check == null) {
            $group = new GroupMasterCode();
            $group->name_group = $request->nameGroup;
            $group->save();
            return redirect()->back()->with('message1', 'Group Added!');
        }else{
            return redirect()->back()->with('message', 'Error! Detected Same Group Name!');
        }

    }

    // Purchasing Controller

    public function purchasing(){

        $item = MasterCode::all();

        return view('purchasing', compact('item'));
    }

    public function purchasing_store(Request $request){

        // insert to purchasing_detail
        $c = count($request->itemCode);
        for ($x=0; $x < $c; $x++) { 
            $detailPurchasing = new DetailPurchasing;
            $detailPurchasing->po_number = $request->poNumber;
            $detailPurchasing->item_code = $request->itemCode[$x];
            $detailPurchasing->qty = $request->qty[$x];
            $detailPurchasing->save();
        }


        // insert to purchasing
        $purchasing = new Purchasing;
        $purchasing->po_number = $request->poNumber;
        $purchasing->date_purchasing = now();
        $purchasing->supplier_name = $request->supplierName;
        $purchasing->location = $request->location;
        $purchasing->remarks = $request->remarks;
        $purchasing->save();

        return redirect()->back()->with('success', 'Success!');

    }



    // Warehouse Controller

    public function warehouse(){

        $warehouse = Purchasing::all();

        return view('warehouse', compact('warehouse'));

    }

    public function warehouse_view($po_number){

        
        $purchasing = DB::table('purchasing')
                    ->where('po_number', $po_number)
                    ->first();

        $warehouse = DB::table('purchasing')
                    ->join('detail_purchasing' , 'purchasing.po_number', 'detail_purchasing.po_number')
                    ->join('master_code', 'detail_purchasing.item_code', 'master_code.item_code')
                    ->where('purchasing.po_number', $po_number)
                    ->get()
                    ->toArray();

        return view('warehouse_view', compact('warehouse' , 'purchasing'));

    }
}
