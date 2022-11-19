<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'description' => \null,
            'items' => [
                [
                    'name' => 'Item Abc',
                    'price' => ($price = \rand(10, 100)) . '.00',
                    'qty' => $qty = rand(1, 50),
                    'amount' => $price * $qty,
                ],
                [
                    'name' => 'Item Def',
                    'price' => ($price = \rand(10, 100)) . '.00',
                    'qty' => $qty = rand(1, 50),
                    'amount' => $price * $qty,
                ],
                [
                    'name' => 'Item Xyz',
                    'price' => ($price = \rand(10, 100)) . '.00',
                    'qty' => $qty = rand(1, 50),
                    'amount' => $price * $qty,
                ]
            ],
            'amount' => \rand(10, 100) . '.00',
            'status' => Arr::random([
                1, 2, 3, 4, 5, 6,
                1, 1, 1, 2, 2, 2,
                1, 2, 3, 4, 5, 6,
            ]),
        ];
    }
}
