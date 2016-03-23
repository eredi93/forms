<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * StringFieldTest.php
 */
class StringFieldTest extends PHPUnit_Framework_TestCase
{
    public function testStringField()
    {
        $stringField = new \Forms\Validators\StringField(6, 10);

        $this->assertTrue($stringField->check('Long_6'), "StringField did not validate correctly.");
        $this->assertFalse($stringField->check('Long5'), "StringField did not validate correctly.");
        $this->assertEquals("Too short, min 6.", $stringField->getError(),"");
    }
}
