<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentsUsersTest extends TestCase {
    use RefreshDatabase;

    private $users;
    private $departments;

    protected $seed = true;

    protected function setUp(): void {
        parent::setUp();

        $this->users = User::all();
        $this->departments = Department::all();
    }

    /**
     * @test
     */
    public function it_should_associate_a_user_to_a_department() {
        $user = $this->users->random();
        $department = $this->departments->random();

        $response = $this->json('PUT', "/api/departments/{$department->id}/users/{$user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseHas('users', [
            'id'            => $user->id,
            'department_id' => $department->id,
        ]);
    }

    /**
     * @test
     */
    public function it_should_disassociate_a_user_from_a_department() {
        $user = $this->users->random();
        $department = $this->departments->random();

        $response = $this->json('DELETE', "/api/departments/{$department->id}/users/{$user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', [
            'id'            => $user->id,
            'department_id' => $department->id,
        ]);
    }
}
