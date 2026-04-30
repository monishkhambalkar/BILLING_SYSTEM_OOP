<?php

namespace App\Services;

use App\Models\Bill;
use App\Interfaces\DiscountStrategyInterface;
use App\Interfaces\TaxStrategyInterface;

class BillingService {

    private $discountStrategy;
    private $taxStrategy;

    public function __construct(
        DiscountStrategyInterface $discountStrategy,
        TaxStrategyInterface $taxStrategy
    ) {
        $this->discountStrategy = $discountStrategy;
        $this->taxStrategy = $taxStrategy;
    }

    public function calculateFinal(Bill $bill): float {
        $amount = $bill->getSubtotal();
        $amount = $this->discountStrategy->apply($amount);
        $amount = $this->taxStrategy->apply($amount);

        return $amount;
    }
}