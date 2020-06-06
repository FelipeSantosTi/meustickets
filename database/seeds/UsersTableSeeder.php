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
            'name' => 'Felipe Santos',
            'email' => 'felipe@meustickets.com.br',
            'password' => bcrypt('Felipe13')
        ]);
    }
}
