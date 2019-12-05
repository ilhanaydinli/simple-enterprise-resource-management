<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hammadde extends Model
{
    protected $table = 'hammadde';

    protected $fillable = [
        'user_id', 'isim', 'miktar', 'fiyat'
    ];
}
