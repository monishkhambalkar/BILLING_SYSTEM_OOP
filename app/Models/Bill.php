<?php

namespace App\Models;

class Bill {
    private $items = [];

    public function addItem(BillItem $item) {
        $this->items[] = $item;
    }

    public function getSubtotal(): float {
        return array_reduce($this->items, function($carry, $item) {
            return $carry + $item->getFinalAmount();
        }, 0);
    }
}