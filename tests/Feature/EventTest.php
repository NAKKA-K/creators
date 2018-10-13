<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $user = factory(\App\User::class)->create();
        $event = factory(\App\Event::class)->create([
            'user_id' => $user->id
        ]);
    }

    public function testIndex()
    {
        $this->get('events/')
            ->assertStatus(200);
    }

    public function testCreate()
    {
        $this->get('events/create/')
            ->assertRedirect('login/');
    }

    public function testShow()
    {
        $this->get('events/1')
            ->assertStatus(200);

        $this->get('events/0')
            ->assertStatus(404);
    }
}
