<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class EventTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $event;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(\App\User::class)->create();
        $this->event = factory(\App\Event::class)->create([
            'user_id' => $this->user->id
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

        Auth::login($this->user, true);
        $this->get('events/create/')
            ->assertStatus(200);
    }

    public function testShow()
    {
        $this->get('events/0')
            ->assertStatus(404);

        $this->get('events/1')
            ->assertStatus(200);
    }
}
