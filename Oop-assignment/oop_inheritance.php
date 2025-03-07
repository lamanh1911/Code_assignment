<?php
abstract class Vehicle
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    abstract public function getSpeed();

    public function getName()
    {
        return $this->name;
    }
}

class Car extends Vehicle
{
    private $horsePower;

    public function __construct($name, $horsePower)
    {
        parent::__construct($name);
        $this->horsePower = $horsePower;
    }

    public function getSpeed()
    {
        return $this->horsePower * 2 . " km/h";
    }
}

class Bicycle extends Vehicle
{
    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function getSpeed()
    {
        return "15 km/h";
    }
}

$car = new Car("Xe hơi", 20);
$bike = new Bicycle("xe đạp");

echo $car->getName() . " là " . $car->getSpeed() . "<br>";
echo $bike->getName() . " là " . $bike->getSpeed() . "<br>";
