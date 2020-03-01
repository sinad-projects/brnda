<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\PaymentAddress;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Resources\reservation as reservationResource;
use Auth;
use Validator;
use App\Bill;
use Carbon;
use Illuminate\Support\Facades\File;

class reservationController extends Controller
{

    // for web only

    # get reservation sent to this user
    public function index(Request $request)
    {
      if($request->has('accept_reserv')){
        Reservation::where('id',$request->reserv_id)
                    ->update([
                      'status' => 1
                    ]);
        return redirect()->back()->with('info','تم تحديث حالة الطلب');
      }
      // to delete reservation
      if($request->has('delete_reserv')){
        Reservation::where('id',$request->reserv_id)->update(['status' => 0]);
        return redirect()->back()->with('info',' تم حذف الطلب بنجاح ');
      }
      // to list all reservation
      $reservations = Reservation::where('reciver_id',Auth::user()->id)
                                  ->where('status', NULL)
                                  ->get();
      $accepted_reservations = Reservation::where('reciver_id',Auth::user()->id)
                                  ->where('status',1)
                                  ->get();
      $confirmable_reservations = Reservation::where('reciver_id',Auth::user()->id)
                                  ->where('status',2)
                                  ->get();
      return view('reservation.index')
              ->with('reservations',$reservations)
              ->with('accepted_reservations',$accepted_reservations)
              ->with('confirmable_reservations',$confirmable_reservations);
    }

    # get reservation sent by this user
    public function sent(){

      $reservations = Reservation::where('user_id',Auth::user()->id)
                                  ->where('status', NULL)->get();
      $accepted_reservations = Reservation::where('user_id',Auth::user()->id)
                                  ->where('status',1)->get();
      $confirmable_reservations = Reservation::where('user_id',Auth::user()->id)
                                  ->where('status',2)->get();
      $rejected_reservations = Reservation::where('user_id',Auth::user()->id)
                                             ->where('status',0)->get();
      $paymentAddress = PaymentAddress::get();
      $settings = Settings::first();

      return view('reservation.sent')
              ->with('reservations',$reservations)
              ->with('accepted_reservations',$accepted_reservations)
              ->with('confirmable_reservations',$confirmable_reservations)
              ->with('rejected_reservations',$rejected_reservations)
              ->with('paymentAddress',$paymentAddress)
              ->with('settings',$settings);
    }

    public function postBill(Request $request){
      if($request->has('delete_bill_btn')){
        $bill = Bill::where('reservation_id',$request->reserv_id)->first();
        File::delete('bill/images/'.$bill->bill_image);
        Bill::where('id',$bill->id)->delete();
        return redirect()->back()->with('info','تم حذف الفاتورة بنجاح');
      }
      $bill_image = $request->file('bill_file');
      $imageName = time().'_'. rand(1000, 9999). '.' .$bill_image->extension();
      $bill_image->move(public_path('bill/images'),$imageName);
      Bill::create([
        'user_id' => Auth::user()->id,
        'reservation_id' => $request->reservation_id,
        'bill_image' => $imageName
      ]);
      return redirect()->back()->with('info','تم رفع الصورة بنجاح');
    }

    // to add new reservation
    public function add_Reservation(Request $request){

      $validator = Validator::make($request->all(),[
        'start_date' => 'required|date',
        'end_date' => 'required|date'
      ]);

      if($request->start_date < $request->end_date){
        if ($validator->passes()) {
          if(Auth::user()->id != $request->reciver_id){
            Reservation::create([
              'agar_id' => $request->agar_id,
              'user_id' => Auth::user()->id,
              'reciver_id' => $request->reciver_id,
              'start_date' => Carbon\Carbon::parse($request->start_date)->toDateTimeString(),
              'end_date' => Carbon\Carbon::parse($request->end_date)->toDateTimeString()
            ]);
            return response()->json([
              'code' => 200,
              'errors' => 'false',
              'message' => 'تم ارسال طلب الايجار بنجاح'
            ]);
          }
          else{
              return response()->json([
                'code' => 400,
                'errors' => 'true',
                'message' => 'لا يمكنك ارسال طلب ايجار على عقارك'
              ]);
            }
        }
      }
      // if validation faild
      return response()->json([
        'code' => 400,
        'error'=>$validator->errors()->all()
      ]);
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
      $validator = Validator::make($request->all(),[
          'start_date' => 'required|date',
          'end_date'   => 'required|date'
      ]);

      if ($validator->passes()) {
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
      return response()->json([
        'code' => 400,
        'error'=>$validator->errors()->all()
      ]);

    }



    public function show($user_id,$id)
    {
      $reservation = Reservation::where('user_id',$user_id)
                                ->where('status',1)
                                ->where('id',$id)->first();
      return new reservationResource($reservation);
    }


    public function update(Request $request)
    {
      Reservation::where('id',$request->reserv_id)
                  ->update(['status' => 1]);
      return response()->json([
        'code' => 200,
        'message' => 'تم تحديث بيانات طلب الحجز بنجاح'
      ]);
    }

    public function destroy(Request $request)
    {
        $reservation = Reservation::where('id',$request->reserv_id)->delete();
        return response()->json([
          'code' => 200,
          'message' => 'تم حذف الطلب بنجاح'
        ]);
    }
}
