<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * NoneOfTest.php
 */
class NoneOfTest extends PHPUnit_Framework_TestCase
{
    public function testNoneOf()
    {
        $noneOf = new \Forms\Validators\NoneOf([
            'option_1',
            'option_2',
        ]);

        $this->assertTrue($noneOf->check('option_5'), "NoneOf did not validate correctly.");
        $this->assertFalse($noneOf->check('option_1'), "NoneOf did not validate correctly.");
        $this->assertEquals("Equal to a preset values.", $noneOf->getError(),"");
    }
}
