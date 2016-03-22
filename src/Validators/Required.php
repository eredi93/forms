<?php
/**
 * @author   Jacopo Scrinzi
 * @date     09/03/2016
 *
 * Required.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\Required
 *
 * Make sure the form value passed is not null or empty
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Required extends Base
{
    /**
     * Build a new instance of the validator
     *
     * @param string $message Message returned on validation error
     * @return void
     */
    public function __construct($message = "This field is required.")
    {
        parent::__construct($message);
    }

    /**
     * Check if value passes the validation
     *
     * @param string $value Value to check
     * @return bool
     */
    public function check($value)
    {
        if ($value && !empty($value)) {
            return true;
        }
        $this->setError($this->message);
        return false;
    }
}
