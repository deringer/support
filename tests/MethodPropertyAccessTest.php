<?php

use Iatstuti\Support\Traits\MethodPropertyAccess;

class MethodPropertyAccessTest extends PHPUnit_Framework_TestCase
{

    /** @test */
    public function it_can_access_a_class_method_as_though_it_was_a_property()
    {
        $class = new ClassWithMethods();

        $this->assertInternalType('array', $class->firstValue);
        $this->assertEmpty($class->firstValue);
        $this->assertSame($class->firstValue(), $class->firstValue);
        $this->assertNull($class->secondValue);
    }


    /** @test */
    public function it_can_determine_that_a_property_exists()
    {
        $class = new ClassWithMethods();

        $this->assertTrue(isset($class->firstValue));
        $this->assertFalse(isset($class->secondValue));
    }

}

class ClassWithMethods
{
    use MethodPropertyAccess;

    protected $first_value = [ ];

    protected $second_value = 'testing';

    public function firstValue()
    {
        return $this->first_value;
    }
}
