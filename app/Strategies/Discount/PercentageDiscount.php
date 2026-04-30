<?php

namespace App\Strategies\Discount;

use App\Interfaces\DiscountStrategyInterface;

class PercentageDiscount implements DiscountStrategyInterface {
    private $percentage;

    public function __construct(float $percentage) {
        $this->percentage = $percentage;
    }

    public function apply(float $amount): float {
        return $amount - ($amount * $this->percentage / 100);
    }
}