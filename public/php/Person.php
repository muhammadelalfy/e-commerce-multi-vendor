<?php
namespace A;
    class Person{

        const MALE='M';
        protected const FEMALE='F';

        public $name = 'ss';
        protected $gender;
        private $age;
        public static $country;

        public function setAge($age){
            $this->age = $age;
            return $this;
        }
        public function setGender($gender){
            $this->$gender = $gender;
            return $this;
        }
        public static function setCountry($country){
            self::$country = $country;
            return self::$country;
        }

    }
