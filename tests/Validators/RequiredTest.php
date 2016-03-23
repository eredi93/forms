<?php

/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * RequiredTest.php
 */
class RequiredTest extends PHPUnit_Framework_TestCase
{
    public function testRequired()
    {
        $required = new \Forms\Validators\Required();

        $this->assertTrue($required->check('option_1'), "Required did not validate correctly.");
        $this->assertFalse($required->check(''), "Required did not validate correctly.");
        $this->assertEquals("This field is required.", $required->getError(),"");
    }
}
