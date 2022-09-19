<?php
namespace A;

include __DIR__ . '/autoload.php';

use A\B\Person;

use ServiceContainer;

$person = new Person;

var_dump($person);
exit;
$person->name = "ali";
ServiceContainer::bind('person' , $person);
echo Facade::name('Muhammad' , 'Basil');


       $person = new Person;

       $person->name = "ali";
       $person::$country = 'jordan';
       $person->setAddress('elhawary st');
       $person->setAge(22);
       ServiceContainer::bind('person' , $person );
       var_dump( $person);
    echo Person::$country;
    echo Person::MALE; //constant is static
