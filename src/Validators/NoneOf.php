<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * NoneOf.php
 */


namespace Forms\Validators;


/**
 * \Forms\Validators\NoneOf
 *
 * Check that the form value passed is equal to none of the values preset
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class NoneOf extends Base
{
    /*
     * @var array List of values to not match
     */
    private $noneOf;

    /**
     * Build a new instance of the validator
     *
     * @param $anyOf array List of values. To pass the validation the value passed has to different from one of them.
     * @param $message string Message returned on validation error
     * @return void
     */
    public function __construct(array $noneOf, $message = "Equal to a preset values.")
    {
        $this->noneOf = $noneOf;
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
        if (!in_array($value, $this->noneOf)) {
            return true;
        }
        $this->setError($this->message);
        return false;
    }
}