<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * RadioInput.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\RadioInput
 *
 * Form Radio Input
 * Extends Input Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class RadioInput extends Input
{
    /**
     * Set checked
     *
     * @return RadioInput $this
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
        $this->attributes['type'] = "radio";
    }
}