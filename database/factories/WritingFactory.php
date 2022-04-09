<?php

namespace Database\Factories;

use App\Models\Writing;
use Illuminate\Database\Eloquent\Factories\Factory;

class WritingFactory extends Factory
{
    protected $model = Writing::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomFloat(2, 1.00, 999999.00),
            'motif' => $this->faker->paragraph(),
            'attachment' => 'NULL',
            'account_id' => 3,
            'journal_id' => $this->faker->numberBetween(9, 12),
            'type' => $this->faker->numberBetween(0, 1),
            'state' => $this->faker->numberBetween(0, 1),
        ];
    }
}
