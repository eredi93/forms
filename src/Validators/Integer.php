<?php
/**
 * @author   Jacopo Scrinzi
 * @date     15/03/2016
 *
 * Integer.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\Integer
 *
 *  Check that the form value passed is an integer
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Integer extends Filter
{
    /**
     * Build a new instance of the validator
     *
     * @param string $message Message returned on validation error
     * @return void
     */
    public function __construct($message = "The field must be an Integer.")
    {
        parent::__construct($message);
        $this->filterFlag = FILTER_VALIDATE_INT;
    }
}
