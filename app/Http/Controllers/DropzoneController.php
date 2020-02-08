<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgarImg;

class DropzoneController extends Controller
{

  public function dropzoneStore(Request $request)
  {
      $image = $request->file('file');

      $imageName = time().'_'. rand(1000, 9999). '.' .$image->extension();
      $image->move(public_path('agar/images'),$imageName);

      AgarImg::create([
          'agar_id' => $request->agar_id,
          'img_wide' => $imageName,
          'thumbnail' => $imageName
      ]);

      return response()->json(['success'=>$imageName]);
  }

}
