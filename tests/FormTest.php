<?php

/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * FormTest.php
 */

require_once 'MockHTTPRequest.php';

class MockForm extends \Forms\Form
{
    protected function setUp()
    {
        $this->fields = [
            (new \Forms\Components\TextInput("identifier"))
                ->setLabel("User / Email")
                ->setAutocomplete("off")
                ->setDecorator("<div class=\"input-field\"> %s </div>")
                ->setValidators([
                    new \Forms\Validators\StringField(6,25),
                    new \Forms\Validators\Required(),
                ]),
            (new \Forms\Components\PasswordInput("password"))
                ->setLabel("Password")
                ->setDecorator("<div class=\"input-field\"> %s </div>")
                ->setValidators([
                    new \Forms\Validators\Required(),
                ]),
            (new \Forms\Components\SubmitButton())
                ->setText("Login"),
        ];

    }
}

class FormTest extends PHPUnit_Framework_TestCase
{
    public function formProvider()
    {
        $csrf_name = MockHTTPRequest::$csrf_name;
        $csrf_value = MockHTTPRequest::$csrf_value;
        $form =  "<form method=\"POST\" action=\"\" ><input type=\"hidden\" name=\"csrf_name\" value=\"{$csrf_name}\">";
        $form .= "<input type=\"hidden\" name=\"csrf_value\" value=\"{$csrf_value}\"><div class=\"input-field\">";
        $form .= "<input name=\"identifier\" type=\"text\" autocomplete=\"off\" ><label for=\"identifier\">User / Email";
        $form .= "</label></div><div class=\"input-field\"><input name=\"password\" type=\"password\" >";
        $form .= "<label for=\"password\">Password</label></div><button type=\"submit\" >Login</button></form>";
        return $form;
    }

    public function testFormRender()
    {
        $request = new MockHTTPRequest();
        $form = new MockForm();
        $this->assertEquals($this->formProvider(), $form->render($request), "Form did not render correctly.");
    }

    public function testFormValidate()
    {
        $request_1 = new MockHTTPRequest([
            'identifier' => 'username',
            'password' => 'pa55word',
        ]);
        $request_2 = new MockHTTPRequest([
            'identifier' => 'usern',
            'password' => '',
        ]);
        $form = new MockForm();

        $this->assertTrue($form->validate($request_1), "Form did not validate.");
        $this->assertFalse($form->validate($request_2), "Form validated when it shouldn't have.");
    }
}
