<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use App\Agar;
use App\AgarExtra;
use App\B_extra;
use App\A_extra;
use App\AgarCond;
use App\AgarType;
use App\Sf_extra;
use App\AgarCalendar;
use App\AgarPrice;
use App\Location;
use App\Reservation;
use App\AgarType;
use App\AgarFloor;
use App\AgarImg;
use App\State;
use App\City;
use App\Settings;

class dashboardController extends Controller
{
    public function index(){

      $users_count = User::get()->count();
      $agars_count = Agar::get()->count();
      $reservation_count = Reservation::get()->count();

      return view('dashboard.index')
              ->with('users_count',$users_count)
              ->with('agars_count',$agars_count)
              ->with('reservation_count',$reservation_count);
    }

    // manage users
    public function getUsers(){
      $users = User::get();
      return view('dashboard.users')
              ->with('users',$users);
    }

    public function postUsers(Request $request){
      //User::where('id',$request->user_id)->delete();
      User::where('id',$request->user_id)->update(['status' => 0]);
      return redirect()->back()->with('info','تم حذف المستخدم بنجاح');
    }

    // manage agars
    public function getAgars(){
      $agars = Agar::where('status',1)->get();
      return view('dashboard.agars')
              ->with('agars',$agars);
    }

    public function postAgars(Request $request){
        Agar::where('id',$request->agar_id)->update(['status' => 0]);
        /*Agar::where('id',$request->agar_id)->delete();
        AgarExtra::where('agar_id',$request->agar_id)->delete();
        AgarPrice::where('agar_id',$request->agar_id)->delete();
        AgarCalendar::where('agar_id',$request->agar_id)->delete();
        $images = AgarImg::where('agar_id',$request->agar_id)->get();
        foreach ($images as $image) {
          File::delete('agar/images/'.$image->img_wide);
          File::delete('agar/images/'.$image->thumbnail);
        }
        AgarImg::where('agar_id',$request->agar_id)->delete();
        Reservation::where('agar_id',$request->agar_id)->delete();*/
        return redirect()->back()->with('info','تم الحذف بنجاح');
    }

    // manage reservation
    public function getReservations(){
      $reservations = Reservation::get();
      return view('dashboard.reservations')
              ->with('reservations',$reservations);
    }

    public function postReservations(Request $request){
      Reservation::where('id',$request->reservation_id)
                    ->delete();
      return redirect()->back()->with('info','تم الحذف بنجاح');
    }


    // manage payment
    public function getPayment(){
      $reservations = Reservation::where('status','<>', 2)->get();
      return view('dashboard.payment')
                ->with('reservations',$reservations);
    }
    public function postPayment(Request $request){
      if($request->has('action')){
        if($request->action == 'confirm'){
          Reservation::where('id',$request->reservation_id)->update(['status' => 2]);
          return redirect()->back()->with('info','تم تأكيد طلب الحجز');
        }elseif($request->action == 'delete'){
          Reservation::where('id',$request->reservation_id)->delete();
          return redirect()->back()->with('info','تم حذف طلب الحجز');
        }
      }
      return redirect()->back()->with('info','قم باختيار عملية اولا');
    }

    // manage b_extra info
    public function getB_extra(){
      $b_extra = B_extra::get();
      return view('dashboard.b_extra')->with('b_extra',$b_extra);
    }
    public function postB_extra(Request $request){
      if($request->has('delete_btn')){
        B_extra::where('id',$request->id)->delete();
        return redirect()->back()->with('info','تم الحذف بنجاح');
      }
      if($request->has('add_btn')){
        B_extra::create([
          'name' => $request->name,
          'status' => $request->status
        ]);
      }
    }

    // manfe a_extra info
    public function getA_extra(){
      $a_extra = A_extra::get();
      return view('dashboard.a_extra')->with('a_extra',$a_extra);
    }
    public function postA_extra(Request $request){
      if($request->has('delete_btn')){
        A_extra::where('id',$request->id)->delete();
        return redirect()->back()->with('info','تم الحذف بنجاح');
      }
      if($request->has('add_btn')){
        A_extra::create([
          'name' => $request->name,
          'status' => $request->status
        ]);
      }
    }

    // mange sf_extra info
    public function getSf_extra(){
      $sf_extra = Sf_extra::get();
      return view('dashboard.sf_extra')->with('sf_extra',$sf_extra);
    }
    public function postSf_extra(Request $request){
      if($request->has('delete_btn')){
        Sf_extra::where('id',$request->id)->delete();
        return redirect()->back()->with('info','تم الحذف بنجاح');
      }
      if($request->has('add_btn')){
        Sf_extra::create([
          'name' => $request->name,
          'status' => $request->status
        ]);
      }
    }

    // mange agars condition info
    public function getCond(){
      $condition = AgarCond::get();
      return view('dashboard.condition')->with('condition',$condition);
    }
    public function postCond(Request $request){
      if($request->has('delete_btn')){
        AgarCond::where('id',$request->id)->delete();
        return redirect()->back()->with('info','تم الحذف بنجاح');
      }
      if($request->has('add_btn')){
        AgarCond::create([
          'name' => $request->name,
          'status' => $request->status
        ]);
      }
    }

    // mange agars type info
    public function getAgar_type(){
      $agar_type = AgarType::get();
      return view('dashboard.agar_type')->with('agar_type',$agar_type);
    }
    public function postAgar_type(Request $request){
      if($request->has('delete_btn')){
        AgarType::where('id',$request->id)->delete();
        return redirect()->back()->with('info','تم الحذف بنجاح');
      }
      if($request->has('add_btn')){
        AgarType::create([
          'type_name' => $request->name,
          'status' => $request->status
        ]);
      }
    }

    // mange agars floor info
    public function getAgar_floor(){
      $agar_floor = AgarFloor::get();
      return view('dashboard.agar_floor')->with('agar_floor',$agar_floor);
    }
    public function postAgar_floor(Request $request){
      if($request->has('delete_btn')){
        AgarFloor::where('id',$request->id)->delete();
        return redirect()->back()->with('info','تم الحذف بنجاح');
      }
      if($request->has('add_btn')){
        AgarFloor::create([
          'floor_name' => $request->name,
          'status' => $request->status
        ]);
      }
    }

    // mange state info
    public function getStates(){
      $states = State::get();
      return view('dashboard.states')->with('states',$states);
    }
    public function postStates(Request $request){
      if($request->has('delete_btn')){
        State::where('id',$request->id)->delete();
        return redirect()->back()->with('info','تم الحذف بنجاح');
      }
      if($request->has('add_btn')){
        State::create([
          'state_name' => $request->name,
          'status' => $request->status
        ]);
      }
    }

    // mange cities info
    public function getCities(){
      $cities = City::get();
      return view('dashboard.cities')->with('cities',$cities);
    }
    public function postCities(Request $request){
      if($request->has('delete_btn')){
        City::where('id',$request->id)->delete();
        return redirect()->back()->with('info','تم الحذف بنجاح');
      }
      if($request->has('add_btn')){
        City::create([
          'city_name' => $request->name,
          'state_id' => $request->state_id,
          'status' => $request->status
        ]);
      }
    }

    // manage site Settings
    public function getSettings(){
      $settings = Settings::first();
      return view('dashboard.settings')
              ->with('settings',$settings);
    }

    public function postSettings(Request $request){

      if($request->hasFile('logo')){
        $logo = $request->file('logo');
        $imageUrl = 'images/'.time().'.'.$logo->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $logo->move($destinationPath,$imageUrl);
        $logo = $imageUrl;
      }else{
        $logo = Settings::first()->logo;
      }

      Settings::where('id',$request->id)->update([
        'site_name' => $request->site_name,
        'region'    => $request->region,
        'logo'      => $logo,
        'email_one' => $request->email_one,
        'email_two' => $request->email_two,
        'phone_one' => $request->phone_one,
        'phone_two' => $request->phone_two,
        'lang' => $request->lang
      ]);

      return redirect()->back()->with('info','تم تحديث البيانات بنجاح');
    }
}
