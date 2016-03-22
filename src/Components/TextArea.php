<?php
/**
 * @author   Jacopo Scrinzi
 * @date     15/03/2016
 *
 * TextArea.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\TextArea
 *
 * Form Text Area
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class TextArea extends Base
{
    /**
     * Render HTML of the form component
     *
     * @param array $arguments List of HTTP components
     * @param array $errors List of validation errors
     * @return string $field Form field component
     */
    public function render($attributes, $errors)
    {
        $textarea =  "<textarea ";
        foreach ($this->attributes as $key => $value) {
            $textarea .= "{$key}=\"{$value}\" ";
        }
        $textarea .= ">";
        if (isset($attributes[$this->attributes['name']]) && $this->isCallBack()) {
            $textarea .= $attributes[$this->attributes['name']];
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
