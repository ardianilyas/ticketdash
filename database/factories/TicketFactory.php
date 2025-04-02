<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(4, true),
            'description' => fake()->sentence(),
            'user_id' => User::factory(),
            'category_id' => Category::all()->random()->id,
            'priority' => fake()->randomElement(['low', 'medium', 'high', 'urgent']),
            'status' => fake()->randomElement(['open', 'in_progress', 'resolved', 'closed']),
            'resolved_at' => fake()->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
