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
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        factory(App\EventParticipant::class, 10)->create();
    }
}
