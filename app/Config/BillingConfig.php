<?php

namespace App\Config;

class BillingConfig {
    public static function isDiscountEnabled(): bool {
        return true; // from DB
    }

    public static function isTaxEnabled(): bool {
        return true;
    }
}