<?php


namespace std;

class ClassC
{
    private $result;

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }


    /**
     * @param float $a
     * @param float $k
     */
    public function linearEquation(float $a, float $k)
    {
        if ($k !== 0) {
            $result = -$a / $k;
            $this->setResult($result);
            return $this->getResult();
        }
        return false;
    }
}

class ClassB extends ClassC
{
    protected $object1;
    private $result1;
    private $result2;

    public function __construct($var)
    {
        $this->object1 = $var;
    }

    /**
     * @param float $a
     * @param float $b
     * @param float $c
     * @return float|int
     */
    protected function getDiscriminant(float $a, float $b, float $c)
    {
        return ($b * $b) - (4 * $a * $c);
    }

    /**
     * @param float $a
     * @param float $b
     * @param float $c
     * @return array|bool
     */
    public  function quadraticEquation(float $a, float $b, float $c)
    {
        $d = $this->getDiscriminant($a,$b, $c);

        if ($d > 0) {
            $this->setResult1(((-1 * $b) + sqrt($d)) / (2 * $a));
            $this->setResult2(((-1 * $b) - sqrt($d)) / (2 * $a));
            return array(
                'x1' =>   $this->getResult1(),
                'x2' =>   $this->getResult1()
            );
        }

        if ($d = 0) {
            $this->setResult1((-1 * $b) / (2 * $a));
            return array(
                'x1' =>   $this->getResult1(),
                'x2' =>   null
            );
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getResult1()
    {
        return $this->result1;
    }

    /**
     * @param mixed $result1
     */
    public function setResult1($result1): void
    {
        $this->result1 = $result1;
    }

    /**
     * @return mixed
     */
    public function getResult2()
    {
        return $this->result2;
    }

    /**
     * @param mixed $result2
     */
    public function setResult2($result2): void
    {
        $this->result2 = $result2;
    }
}

class ClassA extends ClassB
{
    private $object2;
    private $object3;

    public function __construct($var1, $var2, $var3)
    {
        parent::__construct($var1);
        $this->object2 = $var2;
        $this->object3 = $var3;
    }

}
$obj1 = new ClassC();
$obj2 = new ClassC();
$obj3 = new ClassA(new ClassB($obj1),$obj1,$obj2);
$obj1->linearEquation(-2,-80);
echo ($obj1->getResult());