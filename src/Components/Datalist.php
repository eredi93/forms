<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * Datalist.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\Datalist
 *
 * Form Datalist
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Datalist extends Base
{

    /*
     * @var array Associative array for select options eg ['name'=>"text"]
     */
    private $options;

    /**
     * Set datalist options
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
        if (!isset($this->attributes['id'])) {
            $this->attributes['id'] = "_" . $this->attributes['name'];
        }

        $input =  "<input ";
        foreach ($this->attributes as $key => $value) {
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
        $datalist =  $input ."<datalist id=\"{$this->attributes['id']}\">";

        foreach ($this->options as $value) {
            $datalist .= "<option value=\"{$value}\">";
        }

        $datalist .= "</datalist>";

        if ($this->decorator) {
            return $this->renderWithDecorator($datalist);
        }

        return $datalist;
    }
}