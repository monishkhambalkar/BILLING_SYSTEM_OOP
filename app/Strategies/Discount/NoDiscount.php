<?php

namespace App\Strategies\Discount;

use App\Interfaces\DiscountStrategyInterface;

class NoDiscount implements DiscountStrategyInterface {
    public function apply(float $amount): float {
        return $amount;
    }
}
