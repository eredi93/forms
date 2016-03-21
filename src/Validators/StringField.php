<?php
/**
 * @author   Jacopo Scrinzi
 * @date     10/03/2016
 *
 * StringField.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\StringField
 *
 * Check if the form value is a string of the right length
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class StringField extends Base
{
    /*
     * @var int length minimum for the string to pass the validation
     */
    private $min;

    /*
     * @var int length maximum for the string to pass the validation
     */
    private $max;

    /**
     * Build a new instance of the validator
     *
     * @param $min int length minimum for the string to pass the validation
     * @param $max int length maximum for the string to pass the validation
     * @param $message string Message returned on validation error
     * @return void
     */
    public function __construct($min = 0, $max = 255, $message = "")
    {
        $this->min = $min;
        $this->max = $max;
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
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $len = strlen($value);
        if ($this->min > $len) {
            $this->message .= "Too short, min {$this->min}.";
        } elseif ($len > $this->max) {
            $this->message .= "Too long, max {$this->max}.";
        } else {
            return true;
        }
        $this->setError($this->message);
        return false;
    }
}
