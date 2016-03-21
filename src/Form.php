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
     * @var string Form method
     */
    protected $method;
    
    /*
     * @var string Form action
     */
    protected $action;
    
    /*
     * @var string Form enctype
     */
    protected $enctype;
    
    /*
     * @var string Form style class
     */
    protected $class;
    
    /*
     * @var string Form style id
     */
    protected $id;
    
    /*
     * @var array List of form components e.g. \Forms\Components\Input
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
        $this->method = $method;
        $this->action = $action;
        $this->errors = [];
        $this->setUp();
    }

    /**
     * Return validation errors
     *
     * @return array Class validation errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Return fields
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
     * Setup class, this method runs in __construct
     *
     * @return array List of forms arguments from POST or GET
     */
    private function getFormArgs(Request $request)
    {
        $method = strtolower($this->method);
        if ($method == 'get') {
            return $request->getQueryParams();
        }
        return $request->getParsedBody();
    }

    /**
     * Render form
     *
     * @return string HTML From
     */
    public function render(Request $request)
    {
        $args = $this->getFormArgs($request);
        $form = "<form ";
        if ($this->id) {
            $form .= "id=\"{$this->id}\" ";
        }
        if ($this->class) {
            $form .= "class=\"{$this->class}\" ";
        }
        if ($this->method) {
            $form .= "method=\"{$this->method}\" ";
        }
        if ($this->action) {
            $form .= "action=\"{$this->action}\" ";
        }
        if ($this->enctype) {
            $form .= "enctype=\"{$this->action}\" ";
        }
        $form .= ">";
        foreach ($this->csrf as $name) {
            if ($request->getAttribute($name)) {
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
