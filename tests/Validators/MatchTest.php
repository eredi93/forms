<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * MatchTest.php
 */
class MatchTest extends PHPUnit_Framework_TestCase
{
    public function testNoneOf()
    {
        $match = new \Forms\Validators\Match('im_a_match');

        $this->assertTrue($match->check('im_a_match'), "Match did not validate correctly.");
        $this->assertFalse($match->check('im_not_a_match'), "Match did not validate correctly.");
        $this->assertEquals("Not equal to im_a_match.", $match->getError(),"");
    }
}
