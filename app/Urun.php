<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
  protected $table = 'urunler';

  protected $fillable = [
      'user_id', 'isim', 'isciSayisi', 'ekucretler'
  ];
}
