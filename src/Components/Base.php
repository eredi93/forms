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
     * @var array Associative array for components values eg ['class'=>"im_a_class", 'id'=>"im_an_id"]
     */
    protected $args;

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
     * @return void
     */
    public function __construct($name = null)
    {
        $this->args = [];
        $this->validators = [];
        $this->errors = [];
        $this->label = null;
        $this->decorator = null;
        $this->decorator_identifier = "%s";
        $this->call_back = true;
        if ($name) {
            $this->args['name'] = $name;
        } else {
            $this->args['name'] = null;
        }
    }

    /**
     * Set component class
     *
     * @return $this
     */
    public function setClass($class)
    {
        $this->args['class'] = $class;
        return $this;
    }

    /**
     * Set component ID
     *
     * @return $this
     */
    public function setID($id)
    {
        $this->args['id'] = $id;
        return $this;
    }

    /**
     * Set component type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->args['type'] = $type;
        return $this;
    }

    /**
     * Set component value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->args['value'] = $value;
        return $this;
    }

    /**
     * Set component placeholder
     *
     * @return $this
     */
    public function setPlaceholder($placeholder)
    {
        $this->args['placeholder'] = $placeholder;
        return $this;
    }

    /**
     * Set component autocomplete
     *
     * @return $this
     */
    public function setAutocomplete($mode)
    {
        $this->args['autocomplete'] = $mode;
        return $this;
    }

    /**
     * Set component text
     *
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
     * @return $this
     */
    public function setLabel($label)
    {
        if ($label) {
            $this->label = "<label for=\"{$this->args['name']}\">{$label}</label>";
        } else {
            $this->label = null;
        }
        return $this;
    }

    /**
     * Set component decorator
     *
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
     * Set component decorator
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
     * @return bool
     */
    public function isCallBack()
    {
        return $this->call_back;
    }

    /**
     * Set component validators
     *
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
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Return current class name argument
     *
     * @return string
     */
    public function getName()
    {
        return $this->args['name'];
    }

    /**
     * Render HTML of the form component
     *
     * @return string
     */
    public function render($args)
    {
        return "";
    }

    /**
     * Render HTML of the form component with the decorator
     *
     * @return string
     */
    protected function renderWithDecorator($field)
    {
        return $this->decorator[0] . $field . $this->decorator[1];
    }

    /**
     * Validate each validator in class array of validators
     *
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
