<?php

use Illuminate\Database\Seeder;

class EventParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\EventParticipant::create([
            'user_id' => 1,
            'event_id' => 1,
        ]);

        factory(App\EventParticipant::class, 10)->create();
    }
}
