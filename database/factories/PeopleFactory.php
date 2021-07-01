<?php

namespace Database\Factories;

use App\Models\jobs;
use App\Models\people;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = people::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name =  $this->faker->name;
        return [
            "jobs_id" => jobs::all()->random()->id,
            "name" => $name,
            "slug" => Str::slug($name),
            "img" => $this->faker->imageUrl(500, 500, 'cats')
        ];
    }
}

