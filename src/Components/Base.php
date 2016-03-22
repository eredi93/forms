<?php
/**
 * @author   Jacopo Scrinzi
 * @date     10/03/2016
 *
 * Base.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\Base
 *
 * Base Class for forms components
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Base
{
    /*
     * @var array List of Validators
     */
    protected $validators;

    /*
     * @var array Associative array for components attributes eg ['class'=>"im_a_class", 'id'=>"im_an_id"]
     */
    protected $attributes;

    /*
     * @var string Text within element tags
     */
    protected $text;

    /*
     * @var string Label for element
     */
    protected $label;

    /*
     * @var array List of two strings (HTML elements that wrap the form component)
     */
    protected $decorator;

    /*
     * @var string Identifier for the decorator, this will be replaced with the form component
     */
    protected $decorator_identifier;

    /*
     * @var bool Return all value if the form was not validate
     */
    protected $call_back;

    /*
     * @var array A list of validation errors.
     */
    private $errors;

    /**
     * Build a new instance of the component and load settings
     *
     * @param string $name Attribute name of the form component
     * @return void
     */
    public function __construct($name = null)
    {
        $this->attributes = [];
        $this->validators = [];
        $this->errors = [];
        $this->label = null;
        $this->decorator = null;
        $this->decorator_identifier = "%s";
        $this->call_back = true;
        if ($name) {
            $this->attributes['name'] = $name;
        }
    }

    /**
     * Set component attributes
     *
     * @param array $attributes Associative array of HTML attributes
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * Set component attributes
     *
     * @param string $attribute HTML attribute
     * @param string $value Value to associate to the attribute
     * @return $this
     */
    public function appendAttribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;
        return $this;
    }

    /**
     * Set component class
     *
     * @param string $class Class attribute
     * @return $this
     */
    public function setClass($class)
    {
        $this->attributes['class'] = $class;
        return $this;
    }

    /**
     * Set component ID
     *
     * @param string $id ID attribute
     * @return $this
     */
    public function setID($id)
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    /**
     * Set component type
     *
     * @param string $type Type attribute
     * @return $this
     */
    public function setType($type)
    {
        $this->attributes['type'] = $type;
        return $this;
    }

    /**
     * Set component placeholder
     *
     * @param string $placeholder Placeholder attribute
     * @return $this
     */
    public function setPlaceholder($placeholder)
    {
        $this->attributes['placeholder'] = $placeholder;
        return $this;
    }

    /**
     * Set component text
     * 
     * @param string $text Text within component tags
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Set component label
     * 
     * @param string $label Label for component
     * @return $this
     */
    public function setLabel($label)
    {
        if ($label) {
            $this->label = "<label for=\"{$this->attributes['name']}\">{$label}</label>";
        } else {
            $this->label = null;
        }
        return $this;
    }

    /**
     * Set component decorator
     *
     * @param string $decorator Decorator that wrap component
     * @return $this
     */
    public function setDecorator($decorator)
    {
        if (strpos($decorator, $this->decorator_identifier)) {
            $len_identifier = strlen($this->decorator_identifier);
            $needle = stripos($decorator, $this->decorator_identifier);
            $this->decorator = [
                trim(substr($decorator, 0, $needle)),
                trim(substr($decorator, $needle + $len_identifier)),
            ];
        } else {
            $this->decorator = null;
        }
        return $this;
    }

    /**
     * Set Call back to false
     *
     * @return $this
     */
    public function setNoCallBack()
    {
        $this->call_back = false;
        return $this;
    }

    /**
     * Return current class call_back
     *
     * @return bool $this->call_back
     */
    public function isCallBack()
    {
        return $this->call_back;
    }

    /**
     * Set component validators
     *
     * @param array $validators
     * @return $this
     */
    public function setValidators(array $validators)
    {
        $this->validators = $validators;
        return $this;
    }

    /**
     * Return current class errors
     *
     * @return array $this->errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Helper that returns current class name attributes
     *
     * @return string
     */
    public function getName()
    {
        if (isset($this->attributes['name'])) {
            return $this->attributes['name'];
        }
        return null;
    }

    /**
     * Render HTML of the form component
     *
     * @param array $arguments List of HTTP components
     * @param array $errors List of validation errors
     * @return string $field Form field component
     */
    public function render($arguments, $errors)
    {

    }

    /**
     * Render HTML of the form component with the decorator
     *
     * @param string $field Form component
     * @return string
     */
    protected function renderWithDecorator($field)
    {
        return $this->decorator[0] . $field . $this->decorator[1];
    }

    /**
     * Validate each validator in class array of validators
     *
     * @param string $value Value from HTTP request
     * @return bool
     */
    public function validate($value)
    {
        foreach ($this->validators as $validator) {
            if (!$validator->check($value)) {
                array_push($this->errors, $validator->getError());
            }
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}
