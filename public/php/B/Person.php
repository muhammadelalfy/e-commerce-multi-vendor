<?php
namespace B;

use A\B\Person as PersonA;

//use Info;

     function hello(){
        echo 'Hello';
    }

const LARAVEL = 'LARAVEL B';

    class Person
    {
//        use Info;

        public function __construct(){
            echo __CLASS__;
        }

        const MALE='M';
        protected const FEMALE='F';

        public $name = 'ss';
        protected $gender;
        private $age;
        public static $country;


        public static function setCountry($country ){
//            parent::setCountry($country);
            self::$country = $country;
            return self::$country;
        }

    }
