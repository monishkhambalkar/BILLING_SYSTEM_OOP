<?php

namespace App\Interfaces;

interface PricingStrategyInterface
{
    public function calculate(float $baseAmount): float;
}
