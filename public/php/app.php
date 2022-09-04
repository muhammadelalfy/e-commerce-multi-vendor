<?php
namespace A;

include __DIR__ . '/A/B/Person.php';
// include __DIR__ . '/autoload.php';

        $person2 = new Person;
        $person->name = "mohamed";
       $person2->name = "ali";
        $person::$country = 'palestine';
       $person2::$country = 'jordan';
    var_dump( $person2);

    echo Person::$country;
    echo Person::MALE; //constant is static
