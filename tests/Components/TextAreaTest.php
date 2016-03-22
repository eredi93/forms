<?php

/**
 * @author   Jacopo Scrinzi
 * @date     22/03/2016
 *
 * TextAreaTest.php
 */
class TextAreaTest extends PHPUnit_Framework_TestCase
{
    public function componentProvider()
    {
        $component =  "<div class=\"text-field\"><textarea name=\"text\" id=\"text-id\" class=\"text-class\" placeholder=\"Text Area\" >sometext</textarea><label for=\"text\">TextArea</label></div>";
        return $component;
    }

    public function testInput()
    {
        $request = new MockHTTPRequest(['text' => 'sometext']);
        $text = (new \Forms\Components\TextArea("text"))
            ->setID('text-id')->setClass('text-class')->setDecorator('<div class="text-field"> %s </div>')
            ->setLabel('TextArea')->setPlaceholder('Text Area')
            ->setValidators([
                new \Forms\Validators\Required(),
            ]);
        $this->assertEquals($this->componentProvider(), $text->render($request->getParsedBody(), []), "Text Area did not render correctly.");
        $this->assertTrue($text->validate($request), "Text Area did not validate.");
    }
}
