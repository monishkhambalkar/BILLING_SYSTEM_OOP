<?php


require __DIR__ . '/vendor/autoload.php';

use App\Models\Bill;
use App\Models\BillItem;
use App\Services\BillingService;
use App\Strategies\Discount\PercentageDiscount;
use App\Strategies\Discount\NoDiscount;
use App\Strategies\Tax\GSTTax;
use App\Strategies\Tax\NoTax;
use App\Config\BillingConfig;

$bill = new Bill();

// Service
$serviceItem = new BillItem(
    "Consultation",
    1000,
    BillingConfig::isDiscountEnabled() ? new PercentageDiscount(10) : new NoDiscount(),
    BillingConfig::isTaxEnabled() ? new GSTTax(18) : new NoTax()
);

// Medicine
$medicineItem = new BillItem(
    "Paracetamol",
    200,
    new NoDiscount(),
    new GSTTax(5)
);

$bill->addItem($serviceItem);
$bill->addItem($medicineItem);

// Final Bill
$billingService = new BillingService(
    new PercentageDiscount(5), // final discount
    new GSTTax(18) // final tax
);

echo $billingService->calculateFinal($bill);