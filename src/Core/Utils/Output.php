<?php

namespace Phoenix\Core\Utils;

use Shasoft\Console\Console;

class Output
{
    public static function Print($messages, $type = 'info')
    {
        Console::style($type);

        switch (gettype($messages)) {
            case 'string':
            case 'boolean':
                Console::write($messages)->enter();
                break;
            case 'array':
                Console::write(print_r($messages, true));
                Console::enter();
                break;
        }

        Console::setDefault('white','black');
    }
}