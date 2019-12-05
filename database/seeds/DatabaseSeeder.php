<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(HammaddeSeeder::class);
        $this->call(UrunSeeder::class);
        $this->call(UrunHammaddeSeeder::class);
        $this->call(IsciSeeder::class);
    }
}
