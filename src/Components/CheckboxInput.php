<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * CheckboxInput.php
 */


namespace Forms\Components;


class CheckboxInput extends Input
{
    /**
     * Set checked
     *
     * @return CheckboxInput $this
     */
    public function setChecked()
    {
        $this->attributes['checked'] = "checked";
        return $this;
    }

    /**
     * Build a new instance of the Text Input
     * 
     * @param string $name Attribute name of the form component
     * @return void
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->attributes['type'] = "checkbox";
    }
}
