<?php
/**
 * @author   Jacopo Scrinzi
 * @date     15/03/2016
 *
 * Text.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\Text
 *
 * Form Text Area
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Text extends Base
{
    /**
     * Render HTML of the form component
     *
     * @return string
     */
    public function render($args, $errors)
    {
        $textarea =  "<textarea ";
        foreach ($this->args as $key => $value) {
            $textarea .= "{$key}=\"{$value}\" ";
        }
        $textarea .= ">";
        if (isset($args[$this->args['name']]) && $this->isCallBack()) {
            $textarea .= $args[$this->args['name']];
        }
        $textarea .= "</textarea>";

        if ($this->label) {
            $textarea .= $this->label;
        }

        if (!empty($errors)) {
            $textarea .= "<span class=\"error-message\">";
            foreach ($errors as $error) {
                $textarea .= "{$error} ";
            }
            $textarea .= "</span>";
        }

        if ($this->decorator) {
            return $this->renderWithDecorator($textarea);
        }

        return $textarea;
    }
}
