<?php

use Illuminate\Database\Seeder;
use App\Isci;

class IsciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Isci::create([
          'user_id' => 1,
          'adi_soyadi' => 'işçi 1',
          'nitelikleri' => 'işçi özellikleri',
          'maasi' => 1000
        ]);
        Isci::create([
          'user_id' => 1,
          'adi_soyadi' => 'işçi 2',
          'nitelikleri' => 'işçi özellikleri',
          'maasi' => 1000
        ]);
        Isci::create([
          'user_id' => 1,
          'adi_soyadi' => 'işçi 3',
          'nitelikleri' => 'işçi özellikleri',
          'maasi' => 1000
        ]);
        Isci::create([
          'user_id' => 1,
          'adi_soyadi' => 'işçi 4',
          'nitelikleri' => 'işçi özellikleri',
          'maasi' => 1000
        ]);
    }
}
