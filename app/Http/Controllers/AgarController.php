<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\agar as agarResource;
use Illuminate\Support\Facades\File;
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
use App\AgarType;
use App\AgarFloor;
use App\AgarImg;
use App\State;
use App\City;

use Validator;
use Auth;

class AgarController extends Controller
{

  #========= for web only ============#
    public function list()
    {
      $agars = Agar::where('status',1)
                    ->where('owner_id',Auth::user()->id)
                    ->get();
      // get agar type
      $agarType = AgarType::where('status',1)->get();
      // get agar floor
      $agarFloor = AgarFloor::where('status',1)->get();
      // get states info
      $states = State::where('status',1)->get();
      // get citys info
      $citys = City::where('status',1)->get();

      return view('agars.list')
              ->with('agars',$agars)
              ->with('agarType',$agarType)
              ->with('agarFloor',$agarFloor)
              ->with('states',$states)
              ->with('citys',$citys);
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

    public function getDashboard($agar_id){
      $agar = Agar::where('id',$agar_id)->first();
      // get agar basic extract
      $agar_b_extra = B_extra::where('status',1)->get();
      // get agar addithonal extract
      $agar_a_extra = A_extra::where('status',1)->get();
      // get special extra
      $agar_s_extra = Sf_extra::where('status',1)->get();
      // get agar condation
      $agar_cond = AgarCond::where('status',1)->get();

      return view('agars.dashboard')
              ->with('agar',$agar)
              ->with('agar_b_extra',$agar_b_extra)
              ->with('agar_a_extra',$agar_a_extra)
              ->with('agar_cond',$agar_cond)
              ->with('agar_s_extra',$agar_s_extra);
    }

    public function postDashboard(Request $request){

      if($request->has('delete_agar_btn')){
        Agar::where('id',$agar_id)
             ->where('owner_id',$user_id)
             ->delete();
         AgarExtra::where('agar_id',$agar_id)
              ->delete();
         AgarPrice::where('agar_id',$agar_id)
             ->delete();
         AgarCalendar::where('agar_id',$agar_id)
             ->delete();
         AgarCalendar::where('agar_id',$agar_id)
                 ->delete();
         $images = AgarImg::where('agar_id',$agar_id)->get();
         foreach ($images as $image) {
           File::delete('agar/images/'.$image->img_wide);
           File::delete('agar/images/'.$image->thumbnail);
         }
         AgarImg::where('agar_id',$agar_id)
                 ->delete();
         Reservation::where('agar_id',$agar_id)
                 ->delete();
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

      if($request->has('save_price')){
        AgarPrice::where('agar_id',$request->agar_id)
          ->update([
            'day' => $request->day,
            'week' => $request->week,
            'month' => $request->month,
            'currency' => $request->currency
          ]);
          return redirect()->back()->with('info','تم تحديث بيانات السعر');
      }

      if($request->has('save_calendar')){
        AgarCalendar::create([
            'agar_id' => $request->agar_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
          ]);
          return redirect()->back()->with('info','تمت اضافة التقويم بنجاح');
      }

      if($request->has('delete_agar_calendar')){
        AgarCalendar::where('id',$request->calendar_id)->delete();
        return redirect()->back()->with('info','تم حذف التقويم بنجاح');
      }

      if($request->has('edit_calendar')){
        AgarCalendar::where('id',$request->calendar_id)
          ->update([
            'agar_id' => $request->agar_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
          ]);
          return redirect()->back()->with('info','تم تحديث بيانات العقار بنجاح');
      }

      if($request->has('delete_agar_image')){
        // to delete agar image file
        $images = AgarImg::where($request->image_id)->get();
        foreach ($images as $image) {
          File::delete('agar/images/'.$image->img_wide);
          File::delete('agar/images/'.$image->thumbnail);
        }
        AgarImg::where('id',$request->image_id)->delete();
        return redirect()->back()->with('info','تم حذف الصورة بنجاح');
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
        'agar_id' => $agar->id
      ]);

      return redirect()->back()->with('info','تم تسجيل العقار بنجاح');
    }

    // to delete agar
    public function delete(Request $request){
      $delete = Agar::where('id',$request->agar_id)->delete();
      return redirect()->back()->with('info','تم حذف العقار بنجاح');
    }

    // to edit agar info
    public function edit(Request $request){
      if($request->has('edit_agar')){
        $this->validate($request,[
          'agar_name'        => 'required|string',
          'area'             => 'required|string',
          'rooms_number'     => 'required|integer',
          'bathrooms_number' => 'required|integer',
          'agar_desc'        => 'required|string'
        ]);
        $agar = Agar::where('id',$request->agar_id)
          ->update([
            'agar_name' => $request->agar_name,
            'type_id' => $request->type_id,
            'floor_id' => $request->floor_id,
            'rooms_number' => $request->rooms_number,
            'bathrooms_number' => $request->bathrooms_number,
            'agar_desc' => $request->agar_desc
          ]);

          $location = Location::where('geo_loc_id',$request->geo_loc_id)
            ->update([
              'state_id' => $request->state_id,
              'city_id'  => $request->city_id,
              'area'     => $request->area
            ]);

          return redirect()->back()->with('info','تم تحديث بيانات العقار');
      }
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
      $agars = Agar::with('type')
                    ->with('location')
                    ->with('floor')
                    ->with('calendar')
                    ->with('image')
                    ->with('price')
                    ->with('agar_extra')
                    ->where('status',1)->get();
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

    public function search_by_name_api($query){
      $agars = Agar::where('agar_name', 'LIKE' , "%$query%")
            ->where('status',1)
            ->get();
      return agarResource::collection($agars);
    }

    public function agar_fillter_api(Request $request){
    /*  $comments = News::find(123)->with(['comments' => function ($query) {
          $query->where('trashed', '<>', 1);
      }])->get();

      $news = News::find(123);
      $comments = $news->comments()->where('trashed', '<>', 1)->get();
      */
      $agars = Agar::where('status',1)->get();
      foreach ($agars as $agar) {
        $agars_[] = $agar->price()->whereBetween('day',[$request->min_price,$request->max_price])
                                  ->orWhereBetween('week',[$request->min_price,$request->max_price])
                                  ->orWhereBetween('month',[$request->min_price,$request->max_price])
                                  ->get();
      }
      /*$agars = Agar::whereBetween('price',[$request->min_price,$request->max_price])
                    ->whereDate('start_date',$request->date)
                    ->where('rooms_number', $request->rooms_number)
                    ->where('bathrooms_number', $request->bathrooms_number)
                    ->where('status',1)
                    ->get();*/
      return agarResource::collection($agars_);
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'agar_name'        => 'required|string',
        'area'             => 'required|string',
        'rooms_number'     => 'required|integer',
        'bathrooms_number' => 'required|integer',
        'agar_desc'        => 'required|string',
        'state_id'        => 'required|integer',
        'city_id'         => 'required|integer',
        'area'            => 'required|string',
        'type_id'         => 'required|integer',
        'floor_id'        => 'required|integer',
        'geo_loc_id'        => 'required|integer',
        'rooms_number'        => 'required|integer',
        'bathrooms_number'        => 'required|integer'
      ]);

      if ($validator->passes()) {
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
          'owner_id' => $request->user_id,
          'status' => 0
        ]);
        // add agar extra
        AgarExtra::create([
          'agar_id' => $agar->id
        ]);
        // add agar price
        AgarPrice::create([
          'agar_id' => $agar->id
        ]);

        return response()->json([
          'code' => 200,
          'message' => 'تمت اضافة العقار بنجاح'
        ]);
      }
      return response()->json([
        'code' => 400,
        'error'=>$validator->errors()->all()
      ]);

    }

    public function show($id)
    {
      $agar = Agar::where('id',$id)->first();
      return new agarResource($agar);
    }


    public function update(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'agar_name'        => 'required|string',
        'area'             => 'required|string',
        'rooms_number'     => 'required|integer',
        'bathrooms_number' => 'required|integer',
        'agar_desc'        => 'required|string'
      ]);

      if ($validator->passes()) {
        $agar = Agar::where('id',$request->agar_id)
          ->update([
            'agar_name' => $request->agar_name,
            'type_id' => $request->type_id,
            'floor_id' => $request->floor_id,
            'rooms_number' => $request->rooms_number,
            'bathrooms_number' => $request->bathrooms_number,
            'agar_desc' => $request->agar_desc
          ]);

          $location = Location::where('geo_loc_id',$request->geo_loc_id)
            ->update([
              'state_id' => $request->state_id,
              'city_id'  => $request->city_id,
              'area'     => $request->area
            ]);

          return response()->json([
            'code' => 200,
            'message' => 'تم تحديث البيانات بنجاح'
          ]);

        }
        return response()->json([
          'code' => 400,
          'error'=>$validator->errors()->all()
        ]);
    }

    public function agar_update_b_extra(Request $request){
      //$b_extra = json_encode($request->b_extra,JSON_UNESCAPED_UNICODE);
      AgarExtra::where('agar_id',$request->agar_id)
        ->update([
          'agar_id' => $request->agar_id,
          'b_extra' => $request->b_extra
        ]);
        return response()->json([
          'code' => 200,
          'message' => 'تم تحديث البيانات بنجاح'
        ]);
    }

    public function agar_update_a_extra(Request $request){
      AgarExtra::where('agar_id',$request->agar_id)
        ->update([
          'agar_id' => $request->agar_id,
          'a_extra' => $request->a_extra
        ]);
        return response()->json([
          'code' => 200,
          'message' => 'تم تحديث البيانات بنجاح'
        ]);
    }

    public function agar_update_sf_extra(Request $request){
      AgarExtra::where('agar_id',$request->agar_id)
        ->update([
          'agar_id' => $request->agar_id,
          'sf_extra' => $request->sf_extra
        ]);
        return response()->json([
          'code' => 200,
          'message' => 'تم تحديث البيانات بنجاح'
        ]);
    }

    public function agar_update_condition(Request $request){
      AgarExtra::where('agar_id',$request->agar_id)
        ->update([
          'agar_id' => $request->agar_id,
          'cond_extra' => $request->cond_extra
        ]);
        return response()->json([
          'code' => 200,
          'message' => 'تم تحديث البيانات بنجاح'
        ]);
    }

    public function agar_update_price(Request $request){
      AgarPrice::where('agar_id',$request->agar_id)
        ->update([
          'day' => $request->day,
          'week' => $request->week,
          'month' => $request->month,
          'currency' => $request->currency
        ]);
        return response()->json([
          'code' => 200,
          'message' => 'تم تحديث البيانات بنجاح'
        ]);
    }

    public function agar_add_calendar(Request $request){
      AgarCalendar::create([
          'agar_id' => $request->agar_id,
          'start_date' => $request->start_date,
          'end_date' => $request->end_date
        ]);
        return response()->json([
          'code' => 200,
          'message' => 'تمت اضافة التقويم بنجاح'
        ]);
    }

    public function agar_update_calendar(Request $request){
      AgarCalendar::where('id',$request->calendar_id)
        ->update([
          'agar_id' => $request->agar_id,
          'start_date' => $request->start_date,
          'end_date' => $request->end_date
        ]);
        return response()->json([
          'code' => 200,
          'message' => 'تم تحديث البيانات بنجاح'
        ]);
    }

    public function agar_delete_calendar(Request $request){
      AgarCalendar::where('id',$request->calendar_id)->delete();
      return response()->json([
        'code' => 200,
        'message' => 'تم حذف التقويم بنجاح'
      ]);
    }

    public function agar_add_image(Request $request){
      // to be reviewed
      foreach ($request->images as $image) {
        AgarImg::create([
          'agar_id' => $request->agar_id,
          'img_wide' => $image->img_wide,
          'thumbnail' => $image->thumbnail
        ]);
      }
      return response()->json([
        'code' => 200,
        'message' => 'تمت اضافة الصورة بنجاح'
      ]);
    }

    public function agar_delete_image(Request $request){
      $images = AgarImg::where('id',$request->image_id)->get();
      foreach ($images as $image) {
        File::delete('agar/images/'.$image->img_wide);
        File::delete('agar/images/'.$image->thumbnail);
      }
      AgarImg::where('id',$request->image_id)->delete();
      return response()->json([
        'code' => 200,
        'message' => 'تم حذف الصورة بنجاح'
      ]);
    }

    public function destroy($agar_id,$user_id)
    {
       Agar::where('id',$agar_id)
            ->where('owner_id',$user_id)
            ->delete();

        AgarExtra::where('agar_id',$agar_id)
             ->delete();
        AgarPrice::where('agar_id',$agar_id)
            ->delete();
        AgarCalendar::where('agar_id',$agar_id)
            ->delete();
        AgarCalendar::where('agar_id',$agar_id)
                ->delete();

        $images = AgarImg::where('agar_id',$agar_id)->get();
        foreach ($images as $image) {
          File::delete('agar/images/'.$image->img_wide);
          File::delete('agar/images/'.$image->thumbnail);
        }
        AgarImg::where('agar_id',$agar_id)
                ->delete();

        Reservation::where('agar_id',$agar_id)
                ->delete();

        return response()->json([
          'code' => 200,
          'message' => 'تم حذف العقار بنجاح'
        ]);
    }
}
