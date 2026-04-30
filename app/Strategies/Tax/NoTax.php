<?php

namespace App\Strategies\Tax;

use App\Interfaces\TaxStrategyInterface;

class NoTax implements TaxStrategyInterface {
    public function apply(float $amount): float {
        return $amount;
    }
}