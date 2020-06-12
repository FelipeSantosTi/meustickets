<?php

use App\{
    User,
    Event,
};
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = Event::first();

        $event->users()->create([
            'name' => 'Administrador',
            'access_id' => '1',
            'email' => 'admin@meustickets.com.br',
            'password' => bcrypt('adminadmin')
        ]);

        $event->users()->create([
            'name' => 'Avaliador',
            'access_id' => '2',
            'email' => 'avaliador@meustickets.com.br',
            'password' => bcrypt('avaliador')
        ]);

        $event->users()->create([
            'name' => 'Acadêmico',
            'access_id' => '3',
            'email' => 'academico@meustickets.com.br',
            'password' => bcrypt('academico')
        ]);
    }
}
