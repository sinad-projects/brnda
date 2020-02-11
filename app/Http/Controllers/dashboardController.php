<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\agar;
use App\Reservation;

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
      dd($request->user_id);
    }

    // manage agars
    public function getAgars(){
      $agars = Agar::get();
      return view('dashboard.agars')
              ->with('agars',$agars);
    }

    public function postAgars(Request $request){
      dd($request->agar_id);
    }

    // manage reservation
    public function getReservations(){
      $reservations = Reservation::get();
      return view('dashboard.reservations')
              ->with('reservations',$reservations);
    }

    public function postReservations(Request $request){
      dd($request->reservation_id);
    }
}
