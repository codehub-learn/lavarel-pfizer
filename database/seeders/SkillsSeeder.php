<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = Skill::factory()->times(10)->create();

        $users = User::all();

        $users->each(function($user) use ($skills) {
            $ids = $skills->random(5)->pluck('id');

            $user->skills()->sync($ids);
        });
    }
}
