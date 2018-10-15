<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class HomeTest extends TestCase
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
        $this->get('/')
            ->assertStatus(200);
    }

    public function testAbout()
    {
        $this->get('about')
            ->assertStatus(200);
    }

    public function testGuidline()
    {
        $this->get('guideline')
            ->assertStatus(200);
    }

    public function testHelp()
    {
        $this->get('help')
            ->assertStatus(200);
    }

    public function testPrivacy()
    {
        $this->get('privacy')
            ->assertStatus(200);
    }

    public function testTermsOfService()
    {
        $this->get('terms_of_service')
            ->assertStatus(200);
    }

    public function testInquiries()
    {
        $this->get('inquiries/create')
            ->assertRedirect('login');

        Auth::login($this->user);
        $this->get('inquiries/create')
            ->assertStatus(200);
    }

    public function testStoreInquiries()
    {
        $this->post('inquiries')
            ->assertRedirect('login');

        Auth::login($this->user);
        $this->post('inquiries', [
            'title' => 'title',
            'body' => 'body',
        ])->assertRedirect('events');
    }

    public function testOpinions()
    {
        $this->get('opinions/create')
            ->assertRedirect('login');

        Auth::login($this->user);
        $this->get('opinions/create')
            ->assertStatus(200);
    }

    public function testStoreOpinions()
    {
        $this->post('opinions')
            ->assertRedirect('login');

        Auth::login($this->user);
        $this->post('opinions', [
            'body' => 'body',
        ])->assertRedirect('events');
    }
}
