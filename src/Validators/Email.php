<?php
/**
 * @author   Jacopo Scrinzi
 * @date     10/03/2016
 *
 * Email.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\Email
 *
 * Check that the form value passed is an email
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Email extends Filter
{
    /**
     * Build a new instance of the validator
     *
     * @param string $message Message returned on validation error
     * @return void
     */
    public function __construct($message = "The field must be a valid Email.")
    {
        parent::__construct($message);
        $this->filterFlag = FILTER_VALIDATE_EMAIL;
    }
}
