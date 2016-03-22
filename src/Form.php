<?php
/**
 * @author   Jacopo Scrinzi  <scrinzi.jacopo@gmail.com>
 * @date     09/03/2016
 *
 * Form.php
 */

namespace Forms;

/**
 * \Forms\Form
 *
 * Extend this class and create you custom secure form
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Form
{
    /*
     * @var array Associative array for components attributes eg ['method'=>"POST", 'id'=>"im_an_id"]
     */
    protected $attributes;
    
    /*
     * @var array List of form components e.g. \Forms\Components\TextInput
     */
    protected $fields;
    
    /*
     * @var array A list of strings with name of CSRF Tokens e.g. ['csrf_name', 'csrf_value']
     */
    protected $csrf;
    
    /*
     * @var array A list of validation errors.
     */
    private $errors;

    /**
     * Build a new instance of the form, load settings and set up validators
     *
     * @param string $action From action attribute
     * @param string $method From method attribute
     * @param array $csrf List of strings with name of CSRF Tokens
     * @return void
     */
    public function __construct($action = "", $method = "POST", array $csrf = ['csrf_name', 'csrf_value'])
    {
        $this->csrf = $csrf;
        $this->attributes['method'] = $method;
        $this->attributes['action'] = $action;
        $this->errors = [];
        $this->setUp();
    }

    /**
     * Set component attributes
     *
     * @param array $attributes Form HTML attributes
     * @return $this
     */
    protected function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }


    /**
     * Return Form validation errors
     *
     * @return array $this->errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Return Form method
     *
     * @return string $this->attributes['method']
     */
    public function getMethod()
    {
        return $this->attributes['method'];
    }

    /**
     * Return Form fields
     *
     * @return array $this->fields
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Setup class, this method runs in __construct
     *
     * @return void
     */
    protected function setUp()
    {
        
    }

    /**
     * Get arguments from request object
     *
     * @param object $request Request object
     * @return array $args List of forms arguments from POST or GET
     */
    protected function getFormArgs($request)
    {
        $method = strtolower($this->getMethod());
        if ($method == 'get') {
            $args = $request->getQueryParams();
        } else {
            $args = $request->getParsedBody();
        }
        return $args;
    }

    /**
     * Get attribute from request object
     *
     * @param object $request Request object
     * @param string $name string Name of the attribute
     * @return string Attribute for $name
     */
    protected function getRequestAttribute($request, $name)
    {
        return $request->getAttribute($name);
    }

    /**
     * Render form
     *
     * @param object $request Request object
     * @return string HTML From
     */
    public function render($request)
    {
        $args = $this->getFormArgs($request);
        $form = "<form ";
        foreach ($this->attributes as $key => $value) {
            $form .= "{$key}=\"{$value}\" ";
        }
        $form .= ">";
        foreach ($this->csrf as $name) {
            if ($this->getRequestAttribute($request, $name)) {
                $form .= "<input type=\"hidden\" name=\"{$name}\" value=\"{$request->getAttribute($name)}\">";
            }
        }
        foreach ($this->fields as $field) {
            /**
             * @var $field \Forms\Components\Base Form field component
             */
            if(isset($this->errors[$field->getName()])) {
                $errors = $this->errors[$field->getName()];
            } else {
                $errors = [];
            }
            $form .= $field->render($args, $errors);
        }
        $form .= "</form>";
        return $form;
    }

    /**
     * Validate Form, runs validation for each field.
     *
     * @param object $request Request object
     * @return bool Return true if there where no errors during the validation
     */
    public function validate($request)
    {
        $args = $this->getFormArgs($request);
        foreach ($this->fields as $field) {
            /**
             * @var $field \Forms\Components\Base Form field component
             */
            if(isset($args[$field->getName()])) {
                $data = $args[$field->getName()];
            } else {
                $data = null;
            }
            if (!$field->validate($data)) {
                $this->errors[$field->getName()] = $field->getErrors();
            }
        }
        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}
