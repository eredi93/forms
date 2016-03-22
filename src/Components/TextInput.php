<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * TextInput.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\TextInput
 *
 * Form Text Input
 * Extends Input Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class TextInput extends Input
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
        $this->attributes['type'] = "text";
    }
}
