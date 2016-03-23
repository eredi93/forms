<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * IPAddressTest.php
 */
class IPAddressTest extends PHPUnit_Framework_TestCase
{
    public function testIPAddress()
    {
        $ip = new \Forms\Validators\IPAddress();

        $this->assertTrue($ip->check('8.8.8.8'), "IPAddress did not validate correctly.");
        $this->assertFalse($ip->check('10.10.10.300'), "IPAddress did not validate correctly.");
        $this->assertEquals("The field must be a valid IP Address.", $ip->getError(),"");
    }
}
