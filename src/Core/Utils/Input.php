<?php

namespace Phoenix\Core\Utils;

class Input
{
    public static function Exec($argv)
    {
        //array_shift($argv);
        $shortopts  = "";
        $shortopts .= "f:";  // Обязательное значение
        $shortopts .= "v::"; // Необязательное значение
        $shortopts .= "abc"; // Эти параметры не принимают никаких значений

        $longopts  = array(
            "required:",     // Обязательное значение
            "optional::",    // Необязательное значение
            "option",        // Нет значения
            "opt",           // Нет значения
        );
        $options = getopt($shortopts, $longopts);
        var_dump($options);

        /*if (count($argv) > 0) {
            $options = explode(':', implode('', $argv));
            if (class_exists($options[0])) {

            } else {
                Output::print('Класс не найден', 'error');
            }
        } else {
            Output::print('', 'error');
        }

        $class = new $options[0];

        $object = new $class();
        if (method_exists($object, $options[1])) {
            Output::print('Начало', 'ok');
            $method = $options[1];
            $object::$method();
            //$object->$method();
            Output::print('Конец', 'ok');
        } else {
            Output::print('Метод не найден', 'ok');
        }*/
    }
}