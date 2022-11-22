<?php

namespace App\Libs\PaymentMethods;

use App\Libs\PaymentMethods\Contracts\NewChargePayload;
use AppLibs\PaymentMethods\Contracts\ChargeStatus;
use AppLibs\PaymentMethods\Contracts\PaymentMethod;

class BrazucaPayments implements PaymentMethod
{
    public function newCharge(NewChargePayload $newChargePayload): ?ChargeStatus
    {
        //TODO
    }

    public function cancelCharge(string $chargeReference): ?ChargeStatus
    {
        //TODO
    }

    public function chargeStatus(string $chargeReference): ?ChargeStatus
    {
        //TODO
    }

    public function hasBeenPaid(string $chargeReference): bool
    {
        //TODO
    }
}
