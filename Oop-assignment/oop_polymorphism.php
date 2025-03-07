<?php
class Animal
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function makeSound()
    {
        return "tieng keu khong xac dinh";
    }
}

class Dog extends Animal
{
    public function makeSound()
    {
        return "{$this->name} sủa: Gâu gâu!";
    }
}

class Cat extends Animal
{
    public function makeSound()
    {
        return "{$this->name} kêu: meo meo!";
    }
}

class Cow extends Animal
{
    public function makeSound()
    {
        return "{$this->name} kêu: ò ò!";
    }
}
$animals = [new Dog("Chó"), new Cat("Mèo"), new Cow("Bò")];

foreach ($animals as $animal) {
    echo $animal->makeSound();
    echo "<br>";
}
