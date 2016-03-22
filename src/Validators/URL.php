<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * URL.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\URL
 *
 * Check that the form value passed is a valid URL
 * Extends Filter Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class URL extends Filter
{
    /**
     * Build a new instance of the validator
     *
     * @param string $message Message returned on validation error
     * @return void
     */
    public function __construct($message = "The field must be a valid URL.")
    {
        parent::__construct($message);
        $this->filterFlag = FILTER_VALIDATE_URL;
    }
}