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
        Access::create(
            [
                'name' => 'Administrador',
                'description' => 'Acesso total ao sistema',
                'url' => 'administrador'
            ]);

        Access::create(
            [
                'name' => 'Avaliador',
                'description' => 'Acesso às páginas de avaliação',
                'url' => 'avaliador'
            ]);

        Access::create(
            [
                'name' => 'Acadêmico',
                'description' => 'Acesso às páginas de submissão',
                'url' => 'academico'
            ]);
    }
}
