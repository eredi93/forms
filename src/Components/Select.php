<?php
/**
 * @author   Jacopo Scrinzi
 * @date     15/03/2016
 *
 * Select.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\Select
 *
 * Form Select menu
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Select extends Base
{

    /*
     * @var array Associative array for select options eg ['name'=>"text"]
     */
    private $options;

    /**
     * Set select menu
     *
     * @return $this
     */
    public function setOptions($options)
    {
        $this->options = $options;
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
        $select =  "<select ";
        foreach ($this->attributes as $key => $value) {
            $select .= "{$key}=\"{$value}\" ";
        }
        $select .= ">";
        foreach ($this->options as $key => $value) {
            $select .= "<option value=\"{$key}\">{$value}</option>";
        }
        $select .= "</select>";
        if ($this->label) {
            $select .= $this->label;
        }

        if (!empty($errors)) {
            $select .= "<span class=\"error-message\">";
            foreach ($errors as $error) {
                $select .= "{$error} ";
            }
            $select .= "</span>";
        }

        if ($this->decorator) {
            return $this->renderWithDecorator($select);
        }

        return $select;
    }
}
