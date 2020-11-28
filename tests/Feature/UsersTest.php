<?php

namespace Tests\Feature;

use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Tests\TestCase;

class UsersTest extends TestCase {
    use RefreshDatabase;

    private $users;

    protected $seed = true;

    protected function setUp(): void {
        parent::setUp();

        $this->users = User::all();
    }

    /**
     * @test
     */
    public function it_should_return_a_list_of_users() {
        $response = $this->json('GET', '/api/users');

        $response->assertStatus(200)->assertJson(['users' => []]);
    }

    /**
     * @test
     */
    public function it_should_return_a_single_user() {
        $user = $this->users->random();
        $response = $this->json('GET', "/api/users/{$user->id}");

        $response->assertStatus(200)->assertJson(['user' => []]);
    }

    /**
     * @test
     */
    public function it_should_create_a_new_user() {
        $factory = Factory::create();
        $firstName = $factory->firstName;
        $lastName = $factory->lastName;
        $email = $factory->email;
        $password = $factory->password(8);

        $data = compact('firstName', 'lastName', 'email', 'password');

        $response = $this->json('POST', '/api/users', $data);

        $response->assertStatus(201)->assertJson(['user' => []]);

        $this->assertDatabaseHas('users', Arr::except($data, ['password']));
    }

    /**
     * @test
     */
    public function it_should_update_a_single_user() {
        $user = $this->users->random();
        $factory = Factory::create();
        $firstName = $factory->firstName;
        $lastName = $factory->lastName;
        $email = $factory->email;
        $data = compact('firstName', 'lastName', 'email');

        $response = $this->json('PUT', "/api/users/{$user->id}", $data);

        $response->assertStatus(204);

        $this->assertDatabaseHas('users', array_merge($data, ['id' => $user->id]));
    }

    /**
     * @test
     */
    public function it_should_delete_a_single_user() {
        $user = $this->users->random();

        $response = $this->json('DELETE', "/api/users/{$user->id}");

        $response->assertStatus(204);

        $this->assertDeleted($user);
    }
}
