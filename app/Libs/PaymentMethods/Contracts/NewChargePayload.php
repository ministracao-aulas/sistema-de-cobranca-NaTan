<?php

namespace App\Libs\PaymentMethods\Contracts;

use App\Models\Invoice;
use Illuminate\Support\Collection;

interface NewChargePayload
{
    public function make(Invoice $invoice): ?bool;

    public function toArray(): array;

    public function data(): Collection;
}
