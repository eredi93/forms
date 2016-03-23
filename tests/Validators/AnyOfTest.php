<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * AnyOfTest.php
 */
class AnyOfTest extends PHPUnit_Framework_TestCase
{
    public function testAnyOf()
    {
        $anyOf = new \Forms\Validators\AnyOf([
            'option_1',
            'option_2',
        ]);

        $this->assertTrue($anyOf->check('option_1'), "AnyOf did not validate correctly.");
        $this->assertFalse($anyOf->check('option_5'), "AnyOf did not validate correctly.");
        $this->assertEquals("Not equal to any of the preset values.", $anyOf->getError(),"");
    }
}
