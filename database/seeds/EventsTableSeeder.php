<?php

use App\{
    Access,
    Event,
};
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $access = Access::first();

        $access->events()->create([
            'name' => 'Evento Padrão'
        ]);
    }
}
