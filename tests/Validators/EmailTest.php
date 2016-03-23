<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * EmailTest.php
 */
class EmailTest extends PHPUnit_Framework_TestCase
{
    public function testEmail()
    {
        $email = new \Forms\Validators\Email();

        $this->assertTrue($email->check('jacopo@example.com'), "Integer did not validate correctly.");
        $this->assertFalse($email->check('jacopo@example'), "Integer did not validate correctly.");
        $this->assertEquals("The field must be a valid Email.", $email->getError(),"");
    }
}
