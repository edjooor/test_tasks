<?php



require_once('./test_task_2.php');

class ConfigReader {
  public const LOCALE_RU = 'ru';
  public const LOCALE_EN = 'en';
}

class Controller {
  private string $locale;

  public function __construct(string $locale) {
    $this->locale = $locale;
  }

  public function index() {
    $rex = new Dog('Rex', $this->locale === ConfigReader::LOCALE_RU ? 'Лабрадор' : 'Labrador');
    $stooped = new Dog('Stooped', $this->locale === ConfigReader::LOCALE_RU ? 'Бигль' : 'Beagle');
    $murka = new Cat('Мурка');

    $this->showLine($rex);
    $this->showLine($stooped);
    $this->showLine($murka);
  }

  public function showLine(Animal $animal) {
    $sound = $animal->makeSound();
    $name = $animal->getName();
    $type = $animal->getType();

    if ($this->locale === ConfigReader::LOCALE_RU) {
      if ($animal instanceof Dog) {
        $breed = $animal->getBreed();
        echo "$breed $name говорит Гав\n";
      } elseif ($animal instanceof Cat) {
        echo "Кошка $name говорит Мяу\n";
      }
    } else {
      if ($animal instanceof Dog) {
        $breed = $animal->getBreed();
        echo "$breed $name says Woof\n";
      } elseif ($animal instanceof Cat) {
        echo "Cat $name says Meow\n";
      }
    }
  }
}

$controller = new Controller(ConfigReader::LOCALE_RU);
$controller->index();
$controller_en = new Controller(ConfigReader::LOCALE_EN);
$controller_en->index();

// Ожидаемый результат работы программы
// Лабрадор Rex говорит Гав
// Бигль Stooped говорит Гав
// Кошка Мурка говорит Мяу
// Labrador Rex says Woof
// Beagle Stooped says Woof
// Cat Мурка says Meow
?>
