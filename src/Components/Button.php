<?php
/**
 * @author   Jacopo Scrinzi
 * @date     09/03/2016
 *
 * Button.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\Button
 *
 * Form Button
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Button extends Base
{
    /**
     * Render HTML of the form component
     *
     * @param array $arguments List of HTTP components
     * @param array $errors List of validation errors
     * @return string $field Form field component
     */
    public function render($args, $errors)
    {
        $button = "<button ";
        foreach ($this->attributes as $key => $value) {
            $button .= "{$key}=\"{$value}\" ";
        }
        $button .= ">{$this->text}</button>";
        if ($this->decorator) {
            return $this->renderWithDecorator($button);
        }
        return $button;
    }
}
