#!/usr/bin/env php
<?php

namespace Phoenix;

use Phoenix\Core\Utils\Input;
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
    const USER_MODULES_DIR = self::PHOENIX_ROOT . '/../UserModules';

    /**
     *
     * @param $argv array Аргументы командной строки
     */
    public static function run(array $argv)
    {
        ini_set('error_reporting', 'E_ERROR');

        // Автозагрузка классов
        spl_autoload_register(function ($className) {
            $path = Tools::getPath(self::USER_MODULES_DIR."/{$className}.php");
            include $path;
        });

        Input::Exec($argv);
    }
}