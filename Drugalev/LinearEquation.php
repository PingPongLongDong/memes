<?php

namespace Drugalev;

require_once(__DIR__ . "/../autoload.php");

class LinearEquation
{
    protected $result;

    public function getResult()
    {
        return $this->result[0];
    }

    public function setResult($result)
    {
        $this->result[0] = $result;
    }

    public function solve($a, $b)
    {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new DrugalevException(0);
        }
        if ($a == 0) {
            throw new DrugalevException(3);
        }
        if ($a !== 0) {
            $result[0] = -$b / $a;
            $this->setResult($result);
            return $this->getResult();
        }

        throw new DrugalevException();
    }
}