<?php   

    namespace A\B;
    use \Info;

    function hello(){

        echo 'Hello';
    }

    class Person{

        use \Info;

        public function __construct(){

            echo __CLASS__;
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

    }
