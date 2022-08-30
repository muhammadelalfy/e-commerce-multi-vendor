<?php
namespace A;
require __DIR__.'/Person.php';
require __DIR__.'/B/Person.php';

//use B\Person;

use function B\hello;
use const  B\LARAVEL;

    hello();
    echo LARAVEL;

    $person = new Person();
//    $person2 = new \B\Person();
    $person->name = "mohamed";
//    $person2->name = "ali";
    $person::$country = 'palestine';
//    $person2::$country = 'jordan';
//echo "dddd";
    var_dump($person);


    echo Person::$country;
    echo Person::MALE; //constant is static
