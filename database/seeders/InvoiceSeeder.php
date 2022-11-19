<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $increment) {
            $customer = Customer::factory()->createOne();

            foreach (range(1, 6) as $status) {
                Invoice::factory(2)->create([
                    'customer_id' => $customer->id,
                    'status' => $status,
                ]);
            }
        }
    }
}
