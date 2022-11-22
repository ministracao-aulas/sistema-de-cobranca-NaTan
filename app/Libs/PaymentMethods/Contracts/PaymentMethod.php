<?php

namespace AppLibs\PaymentMethods\Contracts;

use App\Libs\PaymentMethods\Contracts\NewChargePayload;

interface PaymentMethod
{
    public function newCharge(NewChargePayload $newChargePayload): ?ChargeStatus;

    public function cancelCharge(string $chargeReference): ?ChargeStatus;

    public function chargeStatus(string $chargeReference): ?ChargeStatus;

    public function hasBeenPaid(string $chargeReference): bool;
}
