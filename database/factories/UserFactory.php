<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $email = $this->faker->unique()->safeEmail();

        return [
            'name' => $this->faker->name(),
            'email' => $email,
            'role' => User::CUSTOMER,
            'avatar' => 'http://i.pravatar.cc/150?u=' . $email,
        ];
    }
}

