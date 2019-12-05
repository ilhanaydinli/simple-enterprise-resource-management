<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uretilen extends Model
{
  protected $table = 'uretilenler';

  protected $fillable = [
      'user_id', 'urun_id', 'uretimMiktari', 'hammaddeUcreti', 'ekUcretler', 'toplamUcret'
  ];

  public function Urun()
  {
      return $this->belongsTo('App\Urun', 'urun_id');
  }
}
