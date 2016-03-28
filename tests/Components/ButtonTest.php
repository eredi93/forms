<?php
/**
 * @author   Jacopo Scrinzi
 * @date     22/03/2016
 *
 * ButtonTest.php
 */

class ButtonTest extends PHPUnit_Framework_TestCase
{
    public function componentProvider()
    {
        $component =  "<div class=\"button-field\"><button type=\"submit\" id=\"button-id\" class=\"button-class\" >Submit</button></div>";
        return $component;
    }

    public function testButton()
    {
        $textInput = (new \Forms\Components\Button())->setType('submit')
            ->setID('button-id')->setClass('button-class')->setDecorator('<div class="button-field"> %s </div>')
            ->setText('Submit');
        $this->assertEquals($this->componentProvider(), $textInput->render([], []), "Button did not render correctly.");
    }
}
