<?php

namespace Database\Factories;

use App\Models\tipsphone;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipsphoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tipsphone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title
        ];
    }
}
