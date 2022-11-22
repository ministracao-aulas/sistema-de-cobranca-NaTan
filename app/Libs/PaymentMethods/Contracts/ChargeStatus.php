<?php

namespace AppLibs\PaymentMethods\Contracts;

interface ChargeStatus
{
    public function type(): int;

    public function typeName(): string;

    public function isNew(): bool;

    public function hasBeenCreated(): bool;

    public function isCancel(): bool;

    public function cancelInfo(): ?object;

    public function status(): ?object;

    public function hasBeenPaid(): bool;
}
