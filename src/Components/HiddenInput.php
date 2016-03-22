<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * HiddenInput.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\HiddenInput
 *
 * Form Hidden Input
 * Extends Input Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class HiddenInput extends Input
{
    /**
     * Build a new instance of the Text Input
     * 
     * @param string $name Attribute name of the form component
     * @return void
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->attributes['type'] = "hidden";
    }
}
