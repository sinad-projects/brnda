<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use App\Agar;
use App\AgarExtra;
use App\AgarCalendar;
use App\AgarPrice;
use App\Location;
use App\Reservation;
use App\AgarType;
use App\AgarFloor;
use App\AgarImg;
use App\State;
use App\City;

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
      $agars = Agar::get();
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
}
