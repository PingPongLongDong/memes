<?php

namespace Drugalev;

use core\EquationInterface;

require_once(__DIR__ . "/../autoload.php");

class QuadraticEquation extends LinearEquation implements EquationInterface
{
    public function solve($a, $b, $c = null)
    {
        if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
            throw new DrugalevException(0);
        }

        if ($a == 0) {
            Log::Instance()->log("Определено, что это линейное уравнение");
            parent::solve($b, $c);
            return $this->getResult();
        }

        $d = $this->getDiscriminant($a, $b, $c);

        if ($d < 0) {
            throw new DrugalevException(1);
        }
        if ($d > 0) {
            Log::Instance()->log("Определено, что это квадратное уравнение");
            $this->setResult(array(
                ((-1 * $b) + sqrt($d)) / (2 * $a),
                ((-1 * $b) - sqrt($d)) / (2 * $a)
            ));
            return $this->getResult();
        }
        if ($d == 0) {
            Log::Instance()->log("Определено, что это квадратное уравнение");
            $this->setResult(array((-1 * $b) / (2 * $a)));
            return $this->getResult();
        }

        throw new DrugalevException();
    }

    protected function getDiscriminant($a, $b, $c)
    {
        return ($b * $b) - (4 * $a * $c);
    }
}
