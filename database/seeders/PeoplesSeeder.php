<?php

namespace Database\Seeders;

use App\Models\people;
use Illuminate\Database\Seeder;

class PeoplesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        people::factory(50)->create();

    }
}
