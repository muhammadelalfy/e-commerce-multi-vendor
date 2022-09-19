<?php

class autoload{
    public static function register($class){
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        if (file_exists($file)) {

            require $file;
            return true;
        }
        return false;
    }

}
$a = new autoload();
    spl_autoload_register( [$a , 'register']);
