<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = factory(\App\User::class)->create();
    }

    public function testIndex()
    {
        $this->assertTrue(true);
    }

    public function testShow()
    {
        $this->get('users/1')
            ->assertStatus(200);
    }

    public function testMypage()
    {
        $this->get('mypage')
            ->assertRedirect('login');

        Auth::login($this->user);
        $this->get('mypage')
            ->assertStatus(200);
    }
}
