<?php
/**
 * @author   Jacopo Scrinzi  <scrinzi.jacopo@gmail.com>
 * @date     09/03/2016
 *
 * Form.php
 */

namespace Forms;

use Psr\Http\Message\ServerRequestInterface as Request;

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
     * @return array Class validation errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Return Form method
     *
     * @return array Class fields
     */
    public function getMethod()
    {
        return $this->attributes['method'];
    }

    /**
     * Return Form fields
     *
     * @return array Class fields
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
     * Get arguments from PSR-7 Request
     *
     * @return array List of forms arguments from POST or GET
     */
    protected function getFormArgs($request)
    {
        $method = strtolower($this->getMethod());
        if ($method == 'get') {
            return $request->getQueryParams();
        }
        return $request->getParsedBody();
    }

    /**
     * Get attribute from from PSR-7 Request
     *
     * @param $request Request PSR-7 Request
     * @param $name string Name of the attribute
     * @return array List of forms arguments from POST or GET
     */
    protected function getRequestAttribute($request, $name)
    {
        return $request->getAttribute($name);
    }

    /**
     * Render form
     *
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
            $form .= $field->render($args, $this->errors[$field->getName()]);
        }
        $form .= "</form>";
        return $form;
    }

    /**
     * Validate Form, runs validation for each field.
     *
     * @return bool Return true if there where no errors during the validation
     */
    public function validate(Request $request)
    {
        $args = $this->getFormArgs($request);
        foreach ($this->fields as $field) {
            if (!$field->validate($args[$field->getName()])) {
                $this->errors[$field->getName()] = $field->getErrors();
            }
        }
        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}
