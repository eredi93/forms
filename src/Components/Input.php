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
     * Render HTML of the form component
     *
     * @return string
     */
    public function render($args, $errors)
    {
        if (isset($args[$this->args['name']]) && $this->isCallBack()) {
            $this->args['value'] = $args[$this->args['name']];
        }
        $input =  "<input ";
        foreach ($this->args as $key => $value) {
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
