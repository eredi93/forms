<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * MacAddress.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\MacAddress
 *
 * Check that the form value passed is a valid MacAddress
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class MacAddress extends Filter
{

    /**
     * Build a new instance of the validator
     *
     * @param $message string Message returned on validation error
     * @return void
     */
    public function __construct($message = "The field must be a valid Mac Address.")
    {
        parent::__construct($message);
        $this->filterFlag = FILTER_VALIDATE_MAC;
    }
}