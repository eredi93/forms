<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * URLTest.php
 */
class URLTest extends PHPUnit_Framework_TestCase
{
    public function testURL()
    {
        $url = new \Forms\Validators\URL();

        $this->assertTrue($url->check('https://www.google.com'), "URL did not validate correctly.");
        $this->assertFalse($url->check('www.google.com'), "URL did not validate correctly.");
        $this->assertEquals("The field must be a valid URL.", $url->getError(),"");
    }
}
