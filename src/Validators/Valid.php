<?php
/**
 * @author   Jacopo Scrinzi
 * @date     10/03/2016
 *
 * Valid.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\Valid
 *
 * Validate a form value using a form class method
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Valid extends Base
{
    /*
     * @var \Forms\Form Value to match with the one passed int the validator
     */
    public $form;
    
    /*
     * @var string form method  for the validation
     */
    public $checkMethod;

    /**
     * Build a new instance of the validator
     *
     * @param $form \Forms\Form or Extensions of the Form class
     * @param $check_method string Method of the form
     * @param $message string Message returned on validation error
     * @return void
     */
    public function __construct($form, $check_method, $message = "Invalid value.")
    {
        $this->form = $form;
        $this->checkMethod = $check_method;
        parent::__construct($message);
    }

    /**
     * Check if value passes the validation
     *
     * @param $value string Value to check
     * @return bool
     */
    public function check($value)
    {
        $response = call_user_func_array(
            [$this->form, $this->checkMethod],
            [$value]
        );

        if (!$response) {
            $this->setError($this->message);
            return false;
        }
        return true;
    }
}
