<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * Regexp.php
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
class Regexp extends Filter
{
    /**
     * Build a new instance of the validator
     *
     * @param string $regexp Regexp that have to match the from value
     * @param string $message Message returned on validation error
     * @return void
     */
    public function __construct($regexp, $message = "Pattern not supported.")
    {
        parent::__construct($message);
        $this->filterFlag = FILTER_VALIDATE_REGEXP;
        $this->filterOptions = ['options' => ['regexp' => $regexp]];
    }
}
