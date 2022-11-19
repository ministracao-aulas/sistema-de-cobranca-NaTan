<?php

namespace Database\Seeders;

use App\Models\Charge;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class ChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 10) as $increment) {
            $invoice = Invoice::factory()->createOne();

            foreach (range(1, 6) as $status) {
                Charge::factory(2)->create([
                    'invoice_id' => $invoice->id,
                    'status' => $status,
                ]);
            }
        }
    }
}
