<?php

use Illuminate\Database\Seeder;

class CirculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(App\Models\Circulo::class, 2000)->create();
    }
}
