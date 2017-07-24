<?php

use Illuminate\Database\Seeder;

class MarcadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Marcador::class, 9000)->create();
    }
}
