<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')->insert([
            'id' => 1,
            'nombre' => 'La Rioja'
        ]);
    }
}
