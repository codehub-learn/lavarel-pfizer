<?php

namespace Tests\Feature;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersSkillsTest extends TestCase {
    use RefreshDatabase;

    private $users;

    protected function setUp(): void {
        parent::setUp();

        $this->users = User::factory()->times(10)->hasAttached(Skill::factory()->count(2))->create();
    }

    /**
     * @test
     */
    public function is_should_return_a_single_user_skills() {
        $user = $this->users->random();

        $response = $this->json('GET', "/api/users/{$user->id}/skills");

        $response->assertStatus(200)->assertJson(['skills' => []]);
    }

    /**
     * @test
     */
    public function is_should_attach_a_group_of_skills_to_a_user() {
        $user = $this->users->random();
        $skills = Skill::all()->random(5)->pluck('id');

        $response = $this->json('POST', "/api/users/{$user->id}/skills", compact('skills'));

        $response->assertStatus(201)->assertJson(['skills' => []]);

        $skills->each(function ($skill) use ($user) {
            $this->assertDatabaseHas('users_skills', [
                'skill_id' => $skill,
                'user_id'  => $user->id,
            ]);
        });
    }
}
