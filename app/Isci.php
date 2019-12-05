<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isci extends Model
{
  protected $table = 'isciler';

  protected $fillable = [
      'user_id', 'adi_soyadi', 'nitelikleri', 'maasi'
  ];
}
