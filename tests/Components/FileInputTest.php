<?php

/**
 * @author   Jacopo Scrinzi
 * @date     22/03/2016
 *
 * FileInputTest.php
 */
class FileInputTest extends PHPUnit_Framework_TestCase
{
    public function componentProvider()
    {
        $component =  "<div class=\"upload-field\"><input name=\"upload\" type=\"file\" id=\"upload-id\" class=\"upload-class\" ><label for=\"upload\">Upload a file</label></div>";
        return $component;
    }

    public function testFileInput()
    {
        $request = new MockHTTPRequest();
        $fileInput = (new \Forms\Components\FileInput("upload"))
            ->setID('upload-id')->setClass('upload-class')
            ->setDecorator('<div class="upload-field"> %s </div>')->setLabel('Upload a file');
        $this->assertEquals($this->componentProvider(), $fileInput->render($request->getParsedBody(), []), "FileInput did not render correctly.");
    }
}
