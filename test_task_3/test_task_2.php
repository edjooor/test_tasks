<?php


abstract class Animal {
  protected $name;

  public function __construct($name) {
    $this->name = $name;
  }

  abstract public function makeSound(): string;

  public function getName(): string {
    return $this->name;
  }

  abstract public function getType(): string;
}

class Dog extends Animal {
  protected string $breed;

  public function __construct(string $name, string $breed) {
    parent::__construct($name);
    $this->breed = $breed;
  }

  public function makeSound(): string {
    return "Woof";
  }

  public function getBreed(): string {
    return $this->breed;
  }

  public function getType(): string {
    return "Dog";
  }
}

class Cat extends Animal {
  public function __construct(string $name) {
    parent::__construct($name);
  }

  public function makeSound(): string {
    return "Meow";
  }

  public function getType(): string {
    return "Cat";
  }
}
?>
