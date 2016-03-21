<?php
/**
 * @author   Jacopo Scrinzi
 * @date     10/03/2016
 *
 * EmailField.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\EmailField
 *
 * Check that the form value passed is an email
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class EmailField extends Base
{

    /**
     * Build a new instance of the validator
     *
     * @param $message string Message returned on validation error
     * @return void
     */
    public function __construct($message = "The field must be an email.")
    {
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
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        $this->setError($this->message);
        return false;
    }
}
