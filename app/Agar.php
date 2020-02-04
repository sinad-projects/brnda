<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agar extends Model
{
    protected $table = 'agar';
    protected $fillable = [
      'agar_id',
      'agar_name',
      'type_id',
      'floor_id',
      'geo_loc_id',
      'rooms_number',
      'bathrooms_number',
      'agar_desc',
      'owner_id',
      'status'
    ];
}
