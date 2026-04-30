<?php

namespace App\Strategies\Tax;

use App\Interfaces\TaxStrategyInterface;

class GSTTax implements TaxStrategyInterface {
    private $rate;

    public function __construct(float $rate) {
        $this->rate = $rate;
    }

    public function apply(float $amount): float {
        return $amount + ($amount * $this->rate / 100);
    }
}