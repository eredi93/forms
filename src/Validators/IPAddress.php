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
     * @param bool $IPv4 Filter only IPv4 addresses
     * @param bool $IPv6 Filter only IPv6 addresses
     * @param bool $no_priv_range Address not in private range
     * @param string $message Message returned on validation error
     * @return void
     */
    public function __construct($IPv4 = true, $IPv6 = false, $no_priv_range = false,
        $message = "The field must be a valid IP Address.")
    {
        parent::__construct($message);
        $this->filterFlag = FILTER_VALIDATE_IP;
        if ($IPv4) {
            $this->filterOptions = FILTER_FLAG_IPV4;
        } elseif ($IPv6) {
            $this->filterOptions = FILTER_FLAG_IPV6;
        } elseif ($no_priv_range) {
            $this->filterOptions = FILTER_FLAG_NO_PRIV_RANGE;
        }
    }

    /**
     * Check if value passes the validation
     *
     * @param string $value Value to check
     * @return bool
     */
    public function check($value)
    {
        if (strpos($value, "/")) {
            $value = explode("/", $value)[0];
        }
        if ($this->filterOptions) {
            $filter = filter_var($value, $this->filterFlag, $this->filterOptions);
        } else {
            $filter = filter_var($value, $this->filterFlag);
        }
        if ($filter) {
            return true;
        }
        $this->setError($this->message);
        return false;
    }
}
