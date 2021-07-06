<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localidades')->insert([
            'id' => 1,
            'nombre' => 'La Rioja',
            'departamento_id' => 1
        ]);
    }
}
