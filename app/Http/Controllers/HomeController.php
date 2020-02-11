<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agar;
use App\AgarType;
use App\AgarFloor;
use App\State;
use App\City;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
      $agars = Agar::where('status',1)->get();
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

}
