<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Club::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition(): array
    {
        $data = now()->subMonths(random_int(1,11));

        return [
            'name' => $this->faker->words(2,true),
            'establishing_date' => now(),
//            'year' => $this->faker->year(),
            'address' => $this->faker->address,
            'funding_sources' => $this->faker->sentence(10,true),
            'created_at' => $data,
            'updated_at' => $data,
        ];
    }
}
