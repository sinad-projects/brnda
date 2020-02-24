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
      $agars = Agar::where('status',2)->get();
      $featured_agars = Agar::where('status',2)->where('featured',1)->get();
      $citys = City::get();
      return view('home')
            ->with('agars',$agars)
            ->with('featured_agars',$featured_agars)
            ->with('citys',$citys);
    }

    // search agar by name
    public function search_by_name(Request $request){
      $query  = $request->input('query');
      $agars = Agar::where('agar_name', 'LIKE' , "%$query%")
            ->where('status',1)
            ->get();
      $featured_agars = Agar::where('agar_name', 'LIKE' , "%$query%")
                            ->where('status',1)
                            ->where('featured',1)->get();
      $citys = City::get();
      return view('home')
              ->with('agars',$agars)
              ->with('featured_agars',$featured_agars)
              ->with('citys',$citys);
    }

}
