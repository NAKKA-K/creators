<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

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
            ->assertStatus(404);
    }
}
