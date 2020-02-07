<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agar;
use App\AgarType;
use App\AgarFloor;
use App\AgarPrice;
use App\Location;
use App\State;
use App\City;
use App\AgarExtra;
use App\AgarCalendar;
use Auth;

class HomeController extends Controller
{

    public function index()
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

      return view('home')
            ->with('agars',$agars)
            ->with('agarType',$agarType)
            ->with('agarFloor',$agarFloor)
            ->with('states',$states)
            ->with('citys',$citys);
    }

    public function store(Request $request){
      $this->validate($request,[
        'agar_name'        => 'required|string',
        'area'             => 'required|string',
        'rooms_number'     => 'required|integer',
        'bathrooms_number' => 'required|integer',
        'agar_desc'        => 'required|string'
      ]);

      $location = Location::create([
        'state_id' => $request->state_id,
        'city_id'  => $request->city_id,
        'area'     => $request->area
      ]);

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

      AgarExtra::create([
        'agar_id' => $agar->id
      ]);


      AgarPrice::create([
        'agar_id' => $agar->id,
        'day' => $request->day,
        'week' => $request->week,
        'month' => $request->month,
        'currency' => $request->currency
      ]);

      AgarCalendar::create([
        'agar_id' => $agar->id,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date
      ]);

      return redirect()->back()->with('info','تم تسجيل العقار بنجاح');
    }

    public function destroy(Request $request)
    {
        $delete = Agar::where('agar_id',$request->agar_id)->delete();
        return redirect()->back()->with('info','تم حذف العقار بنجاح');
    }
}
