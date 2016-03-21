<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * IPAddress.php
 */


namespace Forms\Validators;


/**
 * \Forms\Validators\IPAddress
 *
 * Check that the form value passed is a valid IPAddress
 * Extends Filter Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class IPAddress extends Filter
{

    /**
     * Build a new instance of the validator
     *
     * @param $IPv4 bool Filter only IPv4 addresses
     * @param $IPv6 bool Filter only IPv6 addresses
     * @param $message string Message returned on validation error
     * @return void
     */
    public function __construct($IPv4 = false, $IPv6 = true, $message = "The field must be a valid IP Address.")
    {
        parent::__construct($message);
        $this->filterFlag = FILTER_VALIDATE_IP;
        if ($IPv4) {
            $this->filterOptions = FILTER_FLAG_IPV4;
        } elseif ($IPv6) {
            $this->filterOptions = FILTER_FLAG_IPV6;
        }
    }
}