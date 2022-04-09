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
            'amount' => $this->faker->randomFloat(2 , 1000.00, 900000.00),
            'attachment' => 'NULL',
            'motif' => $this->faker->paragraph(),
            'account_id' => 1,
            'journal_id' => 1,
            'type' => $this->faker->numberBetween(0, 1),
            # 0 écriture sortant, 1 écriture entrant
            'state' => 1,

        ];
    }
}
