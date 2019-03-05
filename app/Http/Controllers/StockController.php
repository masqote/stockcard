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
}
