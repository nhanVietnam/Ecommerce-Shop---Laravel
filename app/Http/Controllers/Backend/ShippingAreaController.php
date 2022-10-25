<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    public function DivisionView(){
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('backend.ship.division.view_division',compact('divisions'));
    }

    public function DivisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',
        ],[
            'division_name.required'=>'Vui lòng nhập thông tin',
        ]);
        
        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }

    public function DivisionEdit($id){
        $division = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('division'));
    }

    public function DivisionUpdate(Request $request, $id){
        $request->validate([
            'division_name' => 'required',
        ],[
            'division_name.required'=>'Vui lòng nhập thông tin',
        ]);
        
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info', 
        );
        return redirect()->route('manage-division')->with($notification);
    }

    public function DivisionDelete($id){
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info', 
        );
        return redirect()->back()->with($notification);
    }

    public function DistrictView(){
        $divisions = ShipDivision::orderBy('id','ASC')->get();
        $districts = ShipDistrict::orderBy('id','DESC')->get();
        return view('backend.ship.district.view_district',compact('divisions','districts'));
    }

    public function DistrictStore(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ],[
            'division_id.required'=>'Vui lòng nhập chọn người được phân công',
            'district_name.required'=>'Vui lòng nhập nhập tên quận',
        ]);
        
        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }

    public function DistrictEdit($id){
        $divisions = ShipDivision::orderBy('id','ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district',compact('divisions','district'));
    }

    public function DistrictUpdate(Request $request, $id){
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ],[
            'division_id.required'=>'Vui lòng nhập chọn người được phân công',
            'district_name.required'=>'Vui lòng nhập tên quận',
        ]);
        
        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
        ]);
        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info', 
        );
        return redirect()->route('manage-district')->with($notification);
    }

    public function DistrictDelete($id){
        ShipState::where('district_id',$id)->delete();
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'info', 
        );
        return redirect()->back()->with($notification);
    }

    public function StateView(){
        $divisions = ShipDivision::orderBy('id','ASC')->get();
        $districts = ShipDistrict::orderBy('id','ASC')->get();
        $states = ShipState::with('division','district')->orderBy('id','DESC')->get();
        return view('backend.ship.state.view_state',compact('divisions','districts','states'));
    }
    
    public function StateStore(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ],[
            'division_id.required'=>'Vui lòng chọn người được phân công',
            'district_id.required'=>'Vui lòng chọn quận hoạt động',
            'state_name.required'=>'Vui lòng chọn bang',
        ]);
        
        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'State Inserted Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }

    public function StateEdit($id){
        $divisions = ShipDivision::orderBy('id','ASC')->get();
        $districts = ShipDistrict::orderBy('id','ASC')->get();
        $state = ShipState::findOrFail($id);
        return view('backend.ship.state.edit_state',compact('divisions','districts','state'));
    }

    public function StateUpdate(Request $request, $id){
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
        ],[
            'division_id.required'=>'Vui lòng nhập chọn người được phân công',
            'district_id.required'=>'Vui lòng nhập nhập tên quận',
        ]);
        
        ShipState::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'info', 
        );
        return redirect()->route('manage-state')->with($notification);
    }

    public function StateDelete($id){
        ShipState::findOrFail($id)->delete();
        $notification = array(
            'message' => 'State Deleted Successfully',
            'alert-type' => 'info', 
        );
        return redirect()->back()->with($notification);
    }

    public function DistrictAjax($division_id){
        $districts = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($districts);
    }
}