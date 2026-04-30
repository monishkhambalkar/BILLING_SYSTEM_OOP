<?php

namespace App\Interfaces;

interface TaxStrategyInterface {
    public function apply(float $amount): float;
}