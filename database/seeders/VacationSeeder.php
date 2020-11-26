<?php

namespace Database\Seeders;

use App\Models\Vacation;
use Illuminate\Database\Seeder;

class VacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vacation::factory()->times(50)->create();
    }
}
