<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_page_work(): void
    {
        /** @var User $user */

        $user = User::factory()->create();
        $response = $this->get('/users/' . $user->id);
        $response->assertStatus(403);
    }
}
