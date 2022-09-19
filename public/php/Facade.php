<?php

    class Facade{
        protected static $container = 'person';

        public static function __callStatic($name , $arguments){
            $person =  ServiceContainer::make(self::$container);
           return $person->name(...$arguments);
        }

    }
