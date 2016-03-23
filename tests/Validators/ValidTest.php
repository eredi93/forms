<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * ValidTest.php
 */

class ValidTest extends PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $form = new \MockForm();
        $valid = new \Forms\Validators\Valid($form, 'checkValidTitle');

        $this->assertTrue($valid->check('title_5'), "Valid did not validate correctly.");
        $this->assertFalse($valid->check('title_1'), "Valid did not validate correctly.");
        $this->assertEquals("Invalid value.", $valid->getError(),"");
    }
}
