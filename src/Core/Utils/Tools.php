<?php

namespace Phoenix\Core\Utils;

/**
 * Класс-библиотека полезных методов
 */
abstract class Tools
{

    /**
     * Метод возвращает корректный путь
     * @param $path
     * @return false|string
     */
    public static function getPath($path)
    {
        return str_replace('\\', '/', $path);
    }
}