#!/usr/bin/env php
<?php

namespace Phoenix;

use Phoenix\Core\Utils\Output;
use Phoenix\Core\Utils\Exception;
use Phoenix\Core\Utils\Tools;
use Shasoft\Console\Console;

/**
 * Основной класс утилиты Феникс
 */
abstract class Phoenix
{
    /**
     * Корневой путь скрипта
     */
    const PHOENIX_ROOT = __DIR__;
    /**
     * Директория для пользовательских скриптов
     */
    const USER_MODULES_DIR = self::PHOENIX_ROOT. '/../UserModules';

    /**
     *
     * @param $argv array Аргументы командной строки
     */
    public static function run(array $argv)
    {
        array_shift($argv);

        // Автозагрузка классов
        spl_autoload_register(function ($className) {
            $path = Tools::getPath(self::USER_MODULES_DIR."/{$className}.php");
            include $path;
        });

        if (count($argv) > 0) {
            $options = explode(':', implode('', $argv));
            $class = $options[0];
            var_dump($options);
            if (class_exists($class)) {
                $object = new $class();
                Output::Print($object, 'debug');
                if (method_exists($object, $options[1])) {
                    Output::print('Начало', 'ok');

                    $method = $options[1];
                    $object::$method();
                    $object->$method();
                    //Bitrix_cli->
                    Output::print('Конец', 'debug');
                } else {
                    Output::print('Метод не найден', 'ok');
                }

            } else {
                Output::print('Класс не найден', 'error');
            }

        } else {
            Output::print('', 'error');
        }
    }
}