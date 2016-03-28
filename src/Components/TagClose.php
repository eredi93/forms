<?php
/**
 * @author   Jacopo Scrinzi  <scrinzi.jacopo@gmail.com>
 * @date     28/03/2016
 *
 * TagClose.php
 */

namespace Forms\Components;


class TagClose
{
    /*
     * @var string Tag type
     */
    protected $tag;

    /**
     * Build a new instance of the Div open
     *
     * @param string $tag Tag type
     * @return void
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
    }
    
    /**
     * Render HTML of the form component
     *
     * @param array $arguments List of HTTP components
     * @param array $errors List of validation errors
     * @return string $field Form field component
     */
    public function render($args, $errors)
    {
        return "</$this->tag>";
    }
}
