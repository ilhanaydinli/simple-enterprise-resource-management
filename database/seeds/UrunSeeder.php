<?php

use Illuminate\Database\Seeder;
use App\Urun;

class UrunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Urun::create([
          'user_id' => '1',
          'isim' => 'Sandalye',
          'isciSayisi' => '2',
          'ekucretler' => '0'
        ]);
    }
}
