<?php
class Person
{
    public $name;
    public $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function introduce()
    {
        return "Xin chào, tôi là {$this->name}, tôi {$this->age} tuổi";
    }
}


$student1 = new Person("Tuấn", 29);
$student2 = new Person("Lam Anh", 28);

echo $student1->introduce() . "<br>";
echo $student2->introduce();
