<?php

use App\User;
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
        User::create([
            'name' => 'Felipe Santos',
            'email' => 'felipe@meustickets.com.br',
            'password' => bcrypt('Felipe13')
        ]);
    }
}
