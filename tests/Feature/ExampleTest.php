<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        
        $response->assertStatus(302); // Menguji status code 302
        $response->assertRedirect('/login'); // Menguji bahwa dialihkan ke /login (sesuaikan jika berbeda)
    }
}
