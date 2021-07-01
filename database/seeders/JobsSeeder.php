<?php

namespace Database\Seeders;

use App\Models\jobs;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jobs::factory(50)->create();
    }
}
