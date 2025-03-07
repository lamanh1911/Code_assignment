<?php
class ElectricBill
{
    public $customerName;
    public $units;
    public $unitPrice;

    function __construct($customerName, $units, $unitPrice)
    {
        $this->customerName = $customerName;
        $this->units = $units;
        $this->unitPrice = $unitPrice;
    }

    function calculateBill()
    {
        $sum = $this->units * $this->unitPrice;
        return "Khách hàng: {$this->customerName} - Số điện: {$this->units} kWh - Thành tiền: {$sum}";
    }
}

$bill1 = new ElectricBill("Lam Anh", 1000, 200);
echo $bill1->calculateBill();
