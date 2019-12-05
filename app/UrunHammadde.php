<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrunHammadde extends Model
{
  protected $table = 'urunHammadde';

  protected $fillable = [
      'urun_id', 'hammadde_id', 'miktar'
  ];
}
