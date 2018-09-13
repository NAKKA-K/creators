<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'user_id' => 1,
                'name' => 'Test Event',
                'description' => 'test',
                'readme' => 'test',
                'published' => false,
                'created_at' => time(),
                'updated_at' => time(),
            ]
        ]);

        factory(App\Event::class, 10)->create();
    }
}
