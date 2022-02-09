<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kd_customer' => 'C001',
            'nama' => $this->faker->name(),
            'no_tlp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address()
        ];
    }
}
