<?php

namespace App\Interfaces;

interface DiscountStrategyInterface
{
    public function apply(float $amount): float;
}
