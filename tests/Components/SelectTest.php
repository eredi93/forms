<?php
/**
 * @author   Jacopo Scrinzi
 * @date     22/03/2016
 *
 * SelectTest.php
 */

class SelectTest extends PHPUnit_Framework_TestCase
{
    public function componentProvider()
    {
        $component =  "<div class=\"select-field\"><select name=\"datalist\" id=\"select-id\" class=\"select-class\" ><option value=\"value1\">option1</option><option value=\"value2\">option2</option></select><label for=\"datalist\">Cool select</label></div>";
        return $component;
    }

    public function testSelect()
    {
        $select = (new \Forms\Components\Select("datalist"))
            ->setID('select-id')->setClass('select-class')
            ->setDecorator('<div class="select-field"> %s </div>')->setLabel('Cool select')
            ->setOptions([
                'value1' => 'option1',
                'value2' => 'option2',
            ]);
        $this->assertEquals($this->componentProvider(), $select->render([], []), "Select did not render correctly.");
    }
}
