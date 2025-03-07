<?php
abstract class Employee
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }
    abstract public function calculateSalary();

    public function getName()
    {
        return $this->name;
    }
}

class FullTimeEmployee extends Employee
{
    private $salaryPerMonth;

    function __construct($name, $salaryPerMonth)
    {
        parent::__construct($name);
        $this->salary = $salaryPerMonth;
    }

    public function calculateSalary()
    {
        return $this->salary;
    }
}

class PartTimeEmployee extends Employee
{
    private $hourlyRate;
    private $hoursWorked;

    function __construct($name, $hourlyRate, $hoursWorked)
    {
        parent::__construct($name);
        $this->hourlyRate = $hourlyRate;
        $this->hoursWorked = $hoursWorked;
    }

    public function calculateSalary()
    {
        return $this->hourlyRate * $this->hoursWorked;
    }
}

$employees = [
    new FullTimeEmployee("Tuan", 2000),
    new FullTimeEmployee("Khoai", 1000),
    new PartTimeEmployee("LA", 20, 10),
];

foreach ($employees as $employee) {
    echo "Nhân viên: " . $employee->getName() . " - Lương: $" . $employee->calculateSalary() . "<br>";
}
