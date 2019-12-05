<?php

use Illuminate\Database\Seeder;
use App\UrunHammadde;

class UrunHammaddeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UrunHammadde::create([
          'urun_id' => 1,
          'hammadde_id' => 1,
          'miktar' => 3
        ]);
        UrunHammadde::create([
          'urun_id' => 1,
          'hammadde_id' => 2,
          'miktar' => 5
        ]);
        UrunHammadde::create([
          'urun_id' => 1,
          'hammadde_id' => 3,
          'miktar' => 7
        ]);
    }
}
