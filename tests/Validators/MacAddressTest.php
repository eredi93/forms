<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * MacAddressTest.php
 */
class MacAddressTest extends PHPUnit_Framework_TestCase
{
    public function testMacAddress()
    {
        $mac = new \Forms\Validators\MacAddress();

        $this->assertTrue($mac->check('00:26:0C:49:E0:49'), "MacAddress did not validate correctly.");
        $this->assertFalse($mac->check('00:26:0C:49:E0'), "MacAddress did not validate correctly.");
        $this->assertEquals("The field must be a valid Mac Address.", $mac->getError(),"");
    }
}
