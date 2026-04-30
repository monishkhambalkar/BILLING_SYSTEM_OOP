# 🏥 Hospital Billing System Design (OOP + SOLID + Design Patterns in PHP)

## 📌 Overview

This document describes the design of a **scalable, maintainable, and extensible billing system** for a Hospital Management System, specifically focused on **consultation billing**.

The system is designed using:

* **OOP principles**
* **SOLID principles**
* **Design Patterns (Strategy Pattern)**

---

## 🧾 Business Flow

### 1. Patient Flow

* Patient registers in the system
* Patient schedules a consultation
* After consultation → **Bill is generated**

---

## 💰 Billing Workflow

### 1. Service (Consultation)

* Service rate → **Mandatory**
* Discount → **Configurable (ON/OFF)**
* Tax → **Configurable (ON/OFF)**

---

### 2. Medicine

* Medicine rate → **Mandatory**
* Discount → **Configurable (ON/OFF)**
* Tax → **Configurable (ON/OFF)**

---

### 3. Miscellaneous Items

* Miscellaneous rate → **Mandatory**
* Discount → **Configurable (ON/OFF)**
* Tax → **Configurable (ON/OFF)**

---

## 🧮 Final Bill Calculation

* Subtotal (sum of all items)
* Final Discount (optional)
* Final Tax (optional)
* **Net Amount**

---

## 🧠 Core Design Idea

Instead of creating separate billing logic for:

* Service
* Medicine
* Misc

We use a **generic structure**:

```
Bill → contains multiple BillItems → each item has its own pricing rules
```

---

## 🏗️ High-Level Design (SOLID Principles)

### ✅ S — Single Responsibility Principle

* `Bill` → Manages overall bill
* `BillItem` → Represents individual line item
* `DiscountStrategy` → Handles discount logic
* `TaxStrategy` → Handles tax logic

---

### ✅ O — Open/Closed Principle

* New item types (Lab Test, Surgery, etc.) can be added
* No modification required in existing code

---

### ✅ L — Liskov Substitution Principle

* All item types (Service, Medicine, Misc) behave uniformly via `BillItem`

---

### ✅ I — Interface Segregation Principle

* Separate interfaces:

  * `DiscountStrategyInterface`
  * `TaxStrategyInterface`

---

### ✅ D — Dependency Inversion Principle

* High-level modules depend on interfaces, not concrete classes
* Strategies (Discount/Tax) are injected

---

## 🎯 Design Pattern Used

### 🔁 Strategy Pattern

Used for:

* Discount calculation
* Tax calculation

---

### Example:

| Strategy Type | Implementation                 |
| ------------- | ------------------------------ |
| Discount      | NoDiscount, PercentageDiscount |
| Tax           | NoTax, GSTTax                  |

---

## 🧱 Core Components

### 1. Bill

* Holds multiple `BillItem`
* Calculates subtotal

---

### 2. BillItem

* Represents a single billing item
* Applies:

  * Discount
  * Tax

---

### 3. Discount Strategies

* `NoDiscount`
* `PercentageDiscount`

---

### 4. Tax Strategies

* `NoTax`
* `GSTTax`

---

### 5. BillingService

* Applies final:

  * Discount
  * Tax
* Calculates **Net Amount**

---

### 6. BillingConfig

* Controls:

  * Discount ON/OFF
  * Tax ON/OFF

---

## 📁 Folder Structure

```
/app
 ├── Models
 │    ├── Bill.php
 │    ├── BillItem.php
 │
 ├── Interfaces
 │    ├── DiscountStrategyInterface.php
 │    ├── TaxStrategyInterface.php
 │
 ├── Strategies
 │    ├── Discount
 │    │     ├── NoDiscount.php
 │    │     ├── PercentageDiscount.php
 │    │
 │    ├── Tax
 │          ├── NoTax.php
 │          ├── GSTTax.php
 │
 ├── Services
 │    ├── BillingService.php
 │
 ├── Config
 │    ├── BillingConfig.php
```

---

## 🚀 Key Benefits

### ✅ Scalable

* Easily supports new billing types

---

### ✅ Maintainable

* No complex conditional logic (`if-else` avoided)

---

### ✅ Extensible

* Add new strategies without modifying existing code

---

### ✅ Testable

* Each component can be tested independently

---

### ✅ Config Driven

* Discount and Tax can be enabled/disabled dynamically

---

## 🔮 Future Enhancements

* Factory Pattern (auto-create strategies)
* Database-driven configuration
* Insurance billing support
* Audit logs & versioning
* Multi-hospital configuration
* Event-driven billing system

---

## 🏁 Conclusion

This design ensures that the billing system is:

* Clean
* Flexible
* Production-ready
* Easy to scale as business grows

---

👉 This is how real-world hospital ERP billing systems are designed.
