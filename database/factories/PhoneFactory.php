<?php

namespace Database\Factories;

use App\Models\phone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipsphones_id' => random_int(1,9),
            'name' => $this->faker->name,
            'ram' => random_int(1,6),
            'SSD' => random_int(6,128),
            'color' => $this->faker->colorName  
        ];
    }
}
