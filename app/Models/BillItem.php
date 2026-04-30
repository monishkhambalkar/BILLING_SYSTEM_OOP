<?php

namespace App\Models;
use App\Interfaces\DiscountStrategyInterface;
use App\Interfaces\TaxStrategyInterface;

class BillItem {
    private $name;
    private $baseAmount;
    private $discountStrategy;
    private $taxStrategy;

    public function __construct(
        string $name,
        float $baseAmount,
        DiscountStrategyInterface $discountStrategy,
        TaxStrategyInterface $taxStrategy
    ) {
        $this->name = $name;
        $this->baseAmount = $baseAmount;
        $this->discountStrategy = $discountStrategy;
        $this->taxStrategy = $taxStrategy;
    }

    public function getFinalAmount(): float {
        $amount = $this->discountStrategy->apply($this->baseAmount);
        $amount = $this->taxStrategy->apply($amount);
        return $amount;
    }
}