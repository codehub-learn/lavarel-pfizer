<?php

namespace Tests\Feature;

use App\Models\Skill;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkillsTest extends TestCase
{
    use RefreshDatabase;

    private $skills;

    protected function setUp(): void {
        parent::setUp();

        $this->skills = Skill::factory()->times(10)->create();
    }

    /**
     * @test
     */
    public function is_should_return_a_list_of_skills()
    {
        $response = $this->json('GET', '/api/skills');

        $response->assertStatus(200)->assertJson(['skills' => []]);
    }

    /**
     * @test
     */
    public function is_should_create_a_new_skill()
    {
        $title = Factory::create()->words(2, true);
        $data = compact('title');
        $response = $this->json('POST', '/api/skills', $data);

        $response->assertStatus(201)->assertJson(['skill' => []]);

        $this->assertDatabaseHas('skills', $data);
    }

    /**
     * @test
     */
    public function is_should_update_a_single_skill() {
        $skill = $this->skills->random();
        $title = Factory::create()->words(2, true);
        $data = compact('title');

        $response = $this->json('PUT', "/api/skills/{$skill->id}", $data);

        $response->assertStatus(204);

        $this->assertDatabaseHas('skills', array_merge($data, ['id' => $skill->id]));
    }

    /**
     * @test
     */
    public function is_should_delete_a_single_skill() {
        $skill = $this->skills->random();

        $response = $this->json('DELETE', "/api/skills/{$skill->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('skills', array_merge(['id' => $skill->id]));
    }
}
