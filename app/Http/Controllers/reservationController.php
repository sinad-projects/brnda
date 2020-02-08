<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Resources\reservation as reservationResource;
use Auth;

class reservationController extends Controller
{

    // for web only
    public function index(Request $request)
    {
      // to delete reservation
      if($request->has('delete_reserv')){
        Reservation::where('id',$request->reserv_id)
                      ->delete();
        return redirect()->back()->with('info','تم الحذف بنجاح');
      }
      // to list all reservation
      $reservations = Reservation::where('user_id',Auth::user()->id)
                    ->get();
      return view('reservation.index')
              ->with('reservations',$reservations);
    }

    // to add new reservation
    public function add_Reservation(Request $request){
      Reservation::create([
        'agar_id' => $request->agar_id,
        'user_id' => Auth::user()->id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date
      ]);
      return redirect()->back()->with('info','تم ارسال طلب الحجز');
    }

    # =========================================================================#

    #==================== for mobile only =====================#
    // get all reservation for spacific user
    public function get_reserv_with_user_id($user_id){
      $reservations = Reservation::where('user_id',$user_id)
                    ->get();
      return reservationResource::collection($reservations);
    }

    // get new reservation for spacific user
    public function get_new_reserv_with_user_id($user_id){
      $reservations = Reservation::where('user_id',$user_id)
                          ->limit(5)
                          ->get();
      return reservationResource::collection($reservations);
    }

    // get new reservation for spacific user
    public function get_accepted_reserv_with_user_id($user_id){
      $reservations = Reservation::where('status',1)
                    ->where('user_id',$user_id)
                    ->get();
      return reservationResource::collection($reservations);
    }

    // get new reservation for spacific user
    public function get_confirmable_reserv_with_user_id($user_id){
      $reservations = Reservation::where('status',2)
                    ->where('user_id',$user_id)
                    ->get();
      return reservationResource::collection($reservations);
    }


    public function store(Request $request)
    {
      Reservation::create([
        'agar_id' => $request->agar_id,
        'user_id' => $request->user_id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date
      ]);
      return response()->json([
        'code' => '200',
        'message' => 'تم ارسال طلب الحجز'
      ]);
    }


    public function show($user_id,$id)
    {
      $reservation = Reservation::where('user_id',$user_id)
                                ->where('status',1)
                                ->where('id',$id)->first();
      return new reservationResource($reservation);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $reservation = Reservation::where('id',$id)->delete();
        return response()->json([
          'code' => 200,
          'message' => 'تم حذف الطلب بنجاح'
        ]);
    }
}
