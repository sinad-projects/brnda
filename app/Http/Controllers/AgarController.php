<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\agar as agarResource;
use App\Agar;
use App\A_extra;
use App\B_extra;
use App\Sf_extra;
use App\AgarExtra;
use App\AgarCond;
use App\AgarCalendar;
use App\AgarPrice;
use App\Location;
use App\Reservation;
use Auth;

class AgarController extends Controller
{

  #========= for web only ============#
    public function list()
    {
      $agars = Agar::where('status',1)
                    ->get();
      return view('agars.list')
              ->with('agars',$agars);
    }

    public function single($agar_id){

      $agar = Agar::where('id',$agar_id)->first();
      // get agar basic extract
      $agar_b_extra = B_extra::where('status',1)->get();
      // get agar addithonal extract
      $agar_a_extra = A_extra::where('status',1)->get();
      // get special extra
      $agar_s_extra = Sf_extra::where('status',1)->get();
      // get agar condation
      $agar_cond = AgarCond::where('status',1)->get();

      return view('agars.single')
              ->with('agar',$agar)
              ->with('agar_b_extra',$agar_b_extra)
              ->with('agar_a_extra',$agar_a_extra)
              ->with('agar_cond',$agar_cond)
              ->with('agar_s_extra',$agar_s_extra);
    }

    public function postSingle(Request $request){

      if($request->has('delete_agar_btn')){
        Agar::where('id',$request->agar_id)->delete();
        $agars = Agar::where('status',1)
                      ->where('owner_id',Auth::user()->id)
                      ->get();
        return view('agars.list')->with('agars',$agars);
      }

      if($request->has('save_b')){
        $b_extra = json_encode($request->b_extra,JSON_UNESCAPED_UNICODE);
        AgarExtra::where('agar_id',$request->agar_id)
          ->update([
            'agar_id' => $request->agar_id,
            'b_extra' => $b_extra
          ]);
          return redirect()->back()->with('info','تم تعديل المرافق الاساسية');
      }

      if($request->has('save_a')){
        $a_extra = json_encode($request->a_extra,JSON_UNESCAPED_UNICODE);
        AgarExtra::where('agar_id',$request->agar_id)
          ->update([
            'agar_id' => $request->agar_id,
            'a_extra' => $a_extra
          ]);
          return redirect()->back()->with('info','تم تحديث المرافق الاضافية');
      }

      if($request->has('save_sf')){
        $sf_extra = json_encode($request->sf_extra,JSON_UNESCAPED_UNICODE);
        AgarExtra::where('agar_id',$request->agar_id)
          ->update([
            'agar_id' => $request->agar_id,
            'sf_extra' => $sf_extra
          ]);
          return redirect()->back()->with('info','تم تحديث المميزات الخاصة');
      }

      if($request->has('save_cond')){
        $cond_extra = json_encode($request->cond_extra,JSON_UNESCAPED_UNICODE);
        AgarExtra::where('agar_id',$request->agar_id)
          ->update([
            'agar_id' => $request->agar_id,
            'cond_extra' => $cond_extra
          ]);
          return redirect()->back()->with('info','تم تحديث شروط السكن');
      }

    }
    // to add new agar
    public function add(Request $request){
      $this->validate($request,[
        'agar_name'        => 'required|string',
        'area'             => 'required|string',
        'rooms_number'     => 'required|integer',
        'bathrooms_number' => 'required|integer',
        'agar_desc'        => 'required|string'
      ]);
      // add agar location
      $location = Location::create([
        'state_id' => $request->state_id,
        'city_id'  => $request->city_id,
        'area'     => $request->area
      ]);
      // add new agar
      $agar = Agar::create([
        'agar_name' => $request->agar_name,
        'type_id' => $request->type_id,
        'floor_id' => $request->floor_id,
        'geo_loc_id' => $location->id,
        'rooms_number' => $request->rooms_number,
        'bathrooms_number' => $request->bathrooms_number,
        'agar_desc' => $request->agar_desc,
        'owner_id' => Auth::user()->id,
        'status' => 0
      ]);
      // add agar extra
      AgarExtra::create([
        'agar_id' => $agar->id
      ]);
      // add agar price
      AgarPrice::create([
        'agar_id' => $agar->id,
        'day' => $request->day,
        'week' => $request->week,
        'month' => $request->month,
        'currency' => $request->currency
      ]);
      // add agar calender
      AgarCalendar::create([
        'agar_id' => $agar->id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date
      ]);
      return redirect()->back()->with('info','تم تسجيل العقار بنجاح');
    }

    // to delete agar
    public function delete(Request $request){
      $delete = Agar::where('id',$request->agar_id)->delete();
      return redirect()->back()->with('info','تم حذف العقار بنجاح');
    }

    # =========================================================================#

    #============ for mobile api only ===============#
    // get all agars for spacific user
    public function get_agar_with_user_id($user_id){
      $agars = Agar::where('status',1)
                    ->where('owner_id',$user_id)
                    ->get();
      return agarResource::collection($agars);
    }
    // get agar with pagination
    public function get_agar_with_paginate(){
      $agars = Agar::where('status',1)->paginate(15);
      // Return collection of agar's as a resource
      return agarResource::collection($agars);
    }

    // get agar without pagination
    public function get_agar_without_paginate(){
      $agars = Agar::where('status',1)->get();
      // Return collection of agar's as a resource
      return agarResource::collection($agars);
    }

    // last added
    public function lastAdded(){
      $agars = Agar::where('status',1)->OrderByRaw('updated_at - created_at DESC')
                          ->limit(5)
                          ->get();
      // Return collection of agar's as a resource
      return agarResource::collection($agars);
    }


    public function store(Request $request)
    {
      //
    }

    public function show($id)
    {
      $agar = Agar::where('id',$id)->first();
      return new agarResource($agar);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($agar_id)
    {
        $delete = Agar::where('id',$agar_id)->delete();
        return response()->json([
          'code' => 200,
          'message' => 'تم حذف العقار بنجاح'
        ]);
    }
}
