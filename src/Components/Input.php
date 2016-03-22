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
     * @param string $value Value attribute
     * @return Input $this
     */
    public function setValue($value)
    {
        $this->attributes['value'] = $value;
        return $this;
    }

    /**
     * Set component autocomplete
     *
     * @param string $mode Mode attribute "on" or "off"
     * @return Input $this
     */
    public function setAutocomplete($mode)
    {
        if ($mode == "on" || $mode == "off") {
            $this->attributes['autocomplete'] = $mode;
            return $this;
        }
        return $this;
    }

    /**
     * Render HTML of the form component
     *
     * @param array $arguments List of HTTP components
     * @param array $errors List of validation errors
     * @return string $field Form field component
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
