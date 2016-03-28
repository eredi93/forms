<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * InputTest.php
 */

class InputTest extends PHPUnit_Framework_TestCase
{
    public function componentProvider()
    {
        $component =  "<div class=\"input-field\"><input name=\"identifier\" type=\"text\" value=\"username\" autocomplete=\"off\" id=\"input-id\" class=\"input-class\" placeholder=\"Identifier\" ><label for=\"identifier\">User / Email</label></div>";
        return $component;
    }

    public function testInput()
    {
        $request = new MockHTTPRequest(['identifier' => 'username']);
        $input = (new \Forms\Components\Input("identifier"))->setType('text')
            ->setValue('username')->setAutocomplete('off')->setID('input-id')
            ->setClass('input-class')->setDecorator('<div class="input-field"> %s </div>')
            ->setLabel('User / Email')->setPlaceholder('Identifier')
            ->setValidators([
                new \Forms\Validators\Required(),
            ]);
        $this->assertEquals($this->componentProvider(), $input->render($request->getParsedBody(), []), "Input did not render correctly.");
        $this->assertTrue($input->validate($request), "Input did not validate.");
    }
}
