<?php

/**
 * @author   Jacopo Scrinzi
 * @date     23/03/2016
 *
 * MockForm.php
 */
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

    public static function checkValidTitle($title)
    {
        $list = ['title_1', 'title_2', 'title_3'];
        return !(bool) in_array($title, $list);
    }
}