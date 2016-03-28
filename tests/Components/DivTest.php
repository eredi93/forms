<?php

/**
 * Created by PhpStorm.
 * User: jacopo
 * Date: 28/03/16
 * Time: 12:38
 */
class DivTest extends PHPUnit_Framework_TestCase
{
    public function componentProvider($type = "open")
    {
        if ($type == "open") {
            return "<div class=\"my-cool-class\">";
        }
        return "</div>";
    }

    public function testDiv()
    {
        $divOpen = new \Forms\Components\TagOpen("div", ['class' => "my-cool-class"]);
        $divClose = new \Forms\Components\TagClose("div");
            
        $this->assertEquals($this->componentProvider("open"), $divOpen->render([], []), "DivOpen did not render correctly.");
        $this->assertEquals($this->componentProvider("close"), $divClose->render([], []), "DivClose did not render correctly.");
    }
}
