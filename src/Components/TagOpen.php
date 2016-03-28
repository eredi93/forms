<?php
/**
 * @author   Jacopo Scrinzi  <scrinzi.jacopo@gmail.com>
 * @date     28/03/2016
 *
 * TagOpen.php
 */

namespace Forms\Components;


class TagOpen
{
    /*
     * @var array Associative array for components attributes eg ['class'=>"im_a_class", 'id'=>"im_an_id"]
     */
    protected $attributes;

    /*
     * @var string Tag type
     */
    protected $tag;

    /**
     * Build a new instance of the Div open
     *
     * @param string $tag Tag type
     * @param array $attributes Attributes of the Div open tag
     * @return void
     */
    public function __construct($tag, array $attributes = [])
    {
        $this->tag = $tag;
        $this->attributes = $attributes;
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
        $tag = "<{$this->tag}";
        foreach ($this->attributes as $key => $value) {
            $tag .= " {$key}=\"{$value}\"";
        }
        $tag .= ">";
        return $tag;
    }
}
