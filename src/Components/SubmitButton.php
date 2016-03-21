<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * SubmitButton.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\SubmitButton
 *
 * Form Submit Button
 * Extends Button Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class SubmitButton extends Button
{
    /**
     * Build a new instance of the Text Input
     *
     * @return void
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->attributes['type'] = "submit";
    }
}
