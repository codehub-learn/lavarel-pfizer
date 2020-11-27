<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentsTest extends TestCase
{
    use RefreshDatabase;

    private $departments;

    protected function setUp(): void {
        parent::setUp();

        $this->departments = Department::factory()->times(10)->create();
    }

    /**
     * @test
     */
    public function it_should_return_a_list_of_departments()
    {
        $response = $this->json('GET', '/api/departments');

        $response->assertStatus(200)->assertJson(['departments' => []]);
    }

    /**
     * @test
     */
    public function it_should_create_a_new_department()
    {
        $title = Factory::create()->words(2, true);
        $user = User::factory()->create();
        $data = ['title' => $title, 'manager_id' => $user->id];
        $response = $this->json('POST', '/api/departments', $data);

        $response->assertStatus(201)->assertJson(['department' => []]);

        $this->assertDatabaseHas('departments', $data);
    }

    /**
     * @test
     */
    public function it_should_update_a_single_department() {
        $department = $this->departments->random();
        $title = Factory::create()->words(2, true);
        $user = User::factory()->create();
        $data = ['title' => $title, 'manager_id' => $user->id];

        $response = $this->json('PUT', "/api/departments/{$department->id}", $data);

        $response->assertStatus(204);

        $this->assertDatabaseHas('departments', array_merge($data, ['id' => $department->id]));
    }

    /**
     * @test
     */
    public function it_should_delete_a_single_department() {
        $department = $this->departments->random();

        $response = $this->json('DELETE', "/api/departments/{$department->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('departments', array_merge(['id' => $department->id]));
    }
}
