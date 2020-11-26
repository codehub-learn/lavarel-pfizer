<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vacation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersVacationsTest extends TestCase {
    use RefreshDatabase;

    private $users;

    protected function setUp(): void {
        parent::setUp();

        $this->users = User::factory()->times(10)->has(Vacation::factory()->count(2))->create();
    }

    /**
     * @test
     */
    public function is_should_return_a_single_user_vacations() {
        $user = $this->users->random();

        $response = $this->json('GET', "/api/users/{$user->id}/vacations");

        $response->assertStatus(200)->assertJson(['vacations' => []]);
    }
}
