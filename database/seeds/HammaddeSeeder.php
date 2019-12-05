<?php

use Illuminate\Database\Seeder;
use App\Hammadde;

class HammaddeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hammadde::create([
          'user_id' => '1',
          'isim' => 'Tahta',
          'miktar' => '100',
          'fiyat' => '5'
        ]);
        Hammadde::create([
          'user_id' => '1',
          'isim' => 'Çivi',
          'miktar' => '1000',
          'fiyat' => '0.1'
        ]);
        Hammadde::create([
          'user_id' => '1',
          'isim' => 'Boya',
          'miktar' => '100',
          'fiyat' => '1'
        ]);
    }
}
