<?php

class ClassC
{
}

class ClassB extends ClassC
{
    protected $object1;

    public function __construct($var)
    {
        $this->object1 = $var;
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