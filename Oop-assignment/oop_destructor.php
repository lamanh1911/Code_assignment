<?php
class Employee
{
    public $name;
    public $position;
    public $salary;

    function __construct($name, $position, $salary)
    {
        $this->name = $name;
        $this->position = $position;
        $this->salary = $salary;
    }

    function displayInfo()
    {
        return "Nhân viên: {$this->name} - Chức vụ: {$this->position} - Lương: {$this->salary} VNĐ <br>";
    }

    function __destruct()
    {
        echo "Nhân viên {$this->name} đã bị xóa khỏi danh sách.";
    }
}

$employ1 = new Employee("Lam Anh", "Giám đốc", 1000);
echo $employ1->displayInfo();
