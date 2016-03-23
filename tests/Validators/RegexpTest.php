<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * RegexpTest.php
 */
class RegexpTest extends PHPUnit_Framework_TestCase
{
    public function testRegexp()
    {
        $ipRegexp = '/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/';
        $regexp = new \Forms\Validators\Regexp($ipRegexp);

        $this->assertTrue($regexp->check('10.10.10.10'), "Regexp did not validate correctly.");
        $this->assertFalse($regexp->check('im.not.an.ip'), "Regexp did not validate correctly.");
        $this->assertEquals("Pattern not supported.", $regexp->getError(),"");
    }
}
