<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charge>
 */
class ChargeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoice_id' => Invoice::factory(),
            'amount' => \rand(10, 100) . '.00',
            'status' => Arr::random([
                1, 2, 3, 4, 5, 6,
                1, 1, 1, 2, 2, 2,
                1, 2, 3, 4, 5, 6,
            ])
        ];
    }
}
