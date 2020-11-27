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
    public function it_should_return_a_single_user_vacations() {
        $user = $this->users->random();

        $response = $this->json('GET', "/api/users/{$user->id}/vacations");

        $response->assertStatus(200)->assertJson(['vacations' => []]);
    }

    /**
     * @test
     */
    public function it_should_return_a_user_vacation() {
        $user = $this->users->random();
        $vacation = $user->vacations->first();

        $response = $this->json('GET', "/api/users/{$user->id}/vacations/{$vacation->id}");

        $response->assertStatus(200)->assertJsonStructure(['vacation' => ['id', 'from', 'to']]);
    }

    /**
     * @test
     */
    public function it_should_create_a_new_vacation_for_a_single_user() {
        $from = now()->format('Y-m-d');
        $to = now()->addWeeks(2)->format('Y-m-d');
        $user = $this->users->random();

        $data = compact('from', 'to');

        $response = $this->json('POST', "/api/users/{$user->id}/vacations", $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('vacations', array_merge($data, ['user_id' => $user->id]));
    }

    /**
     * @test
     */
    public function it_should_update_a_user_vacation() {
        $from = now()->format('Y-m-d');
        $to = now()->addWeeks(2)->format('Y-m-d');
        $user = $this->users->random();
        $vacation = $user->vacations->first();

        $data = compact('from', 'to');

        $response = $this->json('PUT', "/api/users/{$user->id}/vacations/{$vacation->id}", $data);

        $response->assertStatus(204);

        $this->assertDatabaseHas('vacations', array_merge($data, ['user_id' => $user->id]));
    }

    /**
     * @test
     */
    public function it_should_destroy_a_user_vacation() {
        $user = $this->users->random();
        $vacation = $user->vacations->first();

        $response = $this->json('DELETE', "/api/users/{$user->id}/vacations/{$vacation->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('vacations', [
            'id' => $vacation->id,
            'user_id' => $user->id,
        ]);
    }
}
