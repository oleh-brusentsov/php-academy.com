<?php
class shopProduct {
    public $title = "Стандартный товар";
    public $producerMainName = "Фамилия автора";
    public $producerFirstName = "Фамилия автора";
    public $price = "Фамилия автора";

    function __construct($title, $firstName, $mainName, $price )
    {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    public function getProducer () {
        return "$this->producerFirstName " . "$this->producerMainName";
    }
}

$product1 = new shopProduct("Собачье сердце", "Михаил", "Булгаков", 24,44);

$product1->title = 'Властелин колец';
$product1->producerMainName = 'Булгаков';
$product1->producerFirstName = 'Михаил';
$product1->price = '56,99';

echo "Автор: {$product1->getProducer()}";