<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LoggerFactory extends Factory
{
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween(0, 100),
            'type_data' => 'asas', // Always set to "int32"
            'timestamp' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
