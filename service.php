<?php
// Создание трейта с дополнительными услугами
trait Add_service
{
    public function add_price($add_gps, $time, $add_driver) : int
    {
        $time = ceil($time/60);
        return $add_gps * $time + $add_driver;
    }
}


// Создание абстрактного класса с переменными тарифов
abstract class Service
{
    public $range;
    public $time;
    public $add_gps = 0;
    public $add_driver = 0;
    public $printAdd = '';


    // Присваивание значений переменным из формы
    public function __construct()
    {
        if ($_POST['range']){
            $this->range = $_POST['range'];
        } else {
            echo "Не указано расстояние";
        }
        if ($_POST['time']){
            $this->time = $_POST['time'];
        } else {
            echo "Не указано время";
        }
        // Проверка доп. услгу
        if ($_POST['gps']){
            $this->add_gps = 15;
            $this->printAdd .= "- добавлена услуга 'GPS'<br>";
        }
        if ($_POST['driver']){
            $this->add_driver = 100;
            $this->printAdd .= "- добавлена услуга 'Дополнительный водитель'<br>";
        }
    }

    // Расчет цены
    public function price()
    {
        return $this->add_price($this->add_gps, $_POST['time'], $this->add_driver) + $this->range * $this->priceRange + round($this->time * $this->priceTime);
    }

    // Вывод результата
    public function print()
    {
        $operators = [$this->add_price($this->add_gps, $_POST['time'], $this->add_driver), $this->range * $this->priceRange, round($this->time * $this->priceTime)];
        $resultPrint = implode('+', $operators);
        echo "1. Тариф " . $_POST['service'] . "($this->range км, " . $_POST['time'] . " мин.)<br>";
        echo $this->printAdd . '<br>';
        echo "Окончательная цена поездки составит: " . $this->price() . " рублей<br>";
        echo $resultPrint . '<br><br>';
    }
}

// Классы тарифов

class Base extends Service
{
    public $priceRange = 10;
    public $priceTime = 3;

    use Add_service;
}

class Hour extends Service
{
    public $priceRange = 0;
    public $priceTime = 200;

    // Преобразование времени по требованиям тарифа
    public function __construct()
    {
        parent::__construct();
        $this->time /= 60;
        if ($this->time <= 1) {
            $this->time = ceil($this->time);
        }
    }
    use Add_service;
}

class Study extends Service
{
    public $priceRange = 4;
    public $priceTime = 1;

    use Add_service;
}

// Получаем данные о тарифе
switch ($_POST['service']){
    case 'Базовый':
        $user = new Base();
        break;
    case 'Почасовой':
        $user = new Hour();
        break;
    case 'Студенческий':
        $user = new Study();
        break;
    default:
        echo "Не выбрана услуга";
}

// Вывод результата
$user->print();
