<?php

namespace Drugalev;

use RuntimeException;

class DrugalevException extends RuntimeException
{
    public function __construct($code = -1)
    {
        switch ($code) {
            case 0:
                $message = "Unsolvable equation: all parameters should be numeric";
                break;
            case 1:
                $message = "Ошибка: уравнение не имеет решений.";
                break;
            case 2:
                $message = "Ошибка: уравнение не имеет решений.";
                break;
            case 3:
                $message = "Определено, что такое уравнение не существует";
                break;
            default:
                $message = "Unknown solving error";
                break;
        }
        parent::__construct($message, $code);
    }
}
