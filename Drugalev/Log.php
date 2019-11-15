<?php

namespace Drugalev;
use core\LogAbstract;
use core\LogInterface;
require_once(__DIR__ . "/../autoload.php");

class Log extends LogAbstract implements LogInterface
{
    protected $log = array();

    public function _write()
    {
        echo implode(PHP_EOL,$this->log);
    }

    public static function write()
    {
        self::Instance()->_write();
    }

    public static function log(string $str)
    {
        self::Instance()->log[] = $str;

    }
}