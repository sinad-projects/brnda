<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\agar as agarResource;
use App\Agar;

class AgarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    public function get_agar_with_paginate(){
      $agars = Agar::where('status',1)->paginate(15);
      // Return collection of agar's as a resource
      return agarResource::collection($agars);
    }

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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $agar = Agar::where('agar_id',$id)->first();
      return new agarResource($agar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
