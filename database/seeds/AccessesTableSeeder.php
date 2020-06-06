<?php

use App\Access;
use Illuminate\Database\Seeder;

class AccessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Access::create([
            'name' => 'Administrador',
            'description' => 'Acesso total ao sistema',
            'url' => 'administrador'
        ]);
    }
}
