<?php

    namespace A\B;

    use Info;
    use B\Person as personB;
    use Human;
    function hello(){

        echo 'Hello';
    }

    class Person extends personB {

        use Info;

        public function __construct(){

            echo __CLASS__;
        }

        public function setAddress($address)
        {
            $this->$address = $address;
            return $this->$address;
        }

        const MALE='M';
        protected const FEMALE='F';

        public $name = 'ss';
        protected $gender;
        private $age;
        public static $country;


        public static function setContry($country){
            self::$country = $country;
            return self::$country;
        }

        public function age($age){
            return $this->age;
        }

        public function name($name){
            return $this->name;
        }

    }
