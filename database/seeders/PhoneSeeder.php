<?php

namespace Database\Seeders;

use App\Models\phone;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        phone::factory(20)->create();
    }
}
