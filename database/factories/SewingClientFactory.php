<?php

namespace Database\Factories;

use App\Models\SewingClient;
use Illuminate\Database\Eloquent\Factories\Factory;

class SewingClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SewingClient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        $data = now()->subMonths(random_int(1,11));
        return [
            'name' => $this->faker->firstName.' '.$this->faker->lastName,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->randomDigit(),
            'created_at'    => $data,
            'updated_at'    => $data,
        ];
    }
}
