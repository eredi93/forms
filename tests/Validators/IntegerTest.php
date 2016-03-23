<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * IntegerTest.php
 */
class IntegerTest extends PHPUnit_Framework_TestCase
{
    public function testInteger()
    {
        $integer = new \Forms\Validators\Integer();

        $this->assertTrue($integer->check('8'), "Integer did not validate correctly.");
        $this->assertFalse($integer->check('im_a_string'), "Integer did not validate correctly.");
        $this->assertEquals("The field must be an Integer.", $integer->getError(),"");
    }
}
