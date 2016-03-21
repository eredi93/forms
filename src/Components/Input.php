<?php
/**
 * @author   Jacopo Scrinzi
 * @date     09/03/2016
 *
 * Input.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\Input
 *
 * Form Input
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Input extends Base
{

    /**
     * Set component value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->attributes['value'] = $value;
        return $this;
    }

    /**
     * Set component autocomplete
     *
     * @return $this
     */
    public function setAutocomplete($mode)
    {
        $this->attributes['autocomplete'] = $mode;
        return $this;
    }

    /**
     * Render HTML of the form component
     *
     * @return string
     */
    public function render($attributes, $errors)
    {
        if (isset($attributes[$this->attributes['name']]) && $this->isCallBack()) {
            $this->attributes['value'] = $attributes[$this->attributes['name']];
        }
        $input =  "<input ";
        foreach ($this->attributes as $key => $value) {
            $input .= "{$key}=\"{$value}\" ";
        }
        $input .= ">";

        if ($this->label) {
            $input .= $this->label;
        }

        if (!empty($errors)) {
            $input .= "<span class=\"error-message\">";
            foreach ($errors as $error) {
                $input .= "{$error} ";
            }
            $input .= "</span>";
        }

        if ($this->decorator) {
            return $this->renderWithDecorator($input);
        }

        return $input;
    }
}
