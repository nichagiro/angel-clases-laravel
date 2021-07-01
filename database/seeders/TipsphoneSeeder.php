<?php

namespace Database\Seeders;

use App\Models\tipsphone;
use Illuminate\Database\Seeder;

class TipsphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipsphone::factory(20)->create();
    }
}
