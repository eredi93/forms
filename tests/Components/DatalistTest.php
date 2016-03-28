<?php
/**
 * @author   Jacopo Scrinzi
 * @date     22/03/2016
 *
 * DatalistTest.php
 */

class DatalistTest extends PHPUnit_Framework_TestCase
{
    public function componentProvider()
    {
        $component =  "<div class=\"datalist-field\"><input name=\"datalist\" list=datalist-id><label for=\"datalist\">Cool datalist</label><datalist id=\"datalist-id\" class=\"datalist-class\" ><option value=\"option1\"><option value=\"option2\"></datalist></div>";
        return $component;
    }

    public function testDatalist()
    {
        $datalist = (new \Forms\Components\Datalist("datalist"))
            ->setID('datalist-id')->setClass('datalist-class')
            ->setDecorator('<div class="datalist-field"> %s </div>')->setLabel('Cool datalist')
            ->setOptions([
                'option1',
                'option2',
            ]);
        $this->assertEquals($this->componentProvider(), $datalist->render([], []), "Datalist did not render correctly.");
    }
}
