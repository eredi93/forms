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
     * @param array $options List of dalist options
     * @return Datalist $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Render HTML of the form component
     *
     * @param array $arguments List of HTTP components
     * @param array $errors List of validation errors
     * @return string $field Form field component
     */
    public function render($attributes, $errors)
    {
        if (!isset($this->attributes['id'])) {
            $this->attributes['id'] = "_" . $this->attributes['name'];
        }
        $input =  "<input name=\"{$this->attributes['name']}\" list={$this->attributes['id']}>";
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
        $datalist =  $input ."<datalist ";
        foreach ($this->attributes as $key => $value) {
            if ($key != "name") {
                $datalist .= "{$key}=\"{$value}\" ";
            }
        }
        $datalist .= ">";

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
