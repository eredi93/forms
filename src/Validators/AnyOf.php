<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * AnyOf.php
 */


namespace Forms\Validators;


/**
 * \Forms\Validators\AnyOf
 *
 * Check that the form value passed is equal to any of the values preset
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class AnyOf extends Base
{
    /*
     * @var array List of values to match
     */
    private $anyOf;

    /**
     * Build a new instance of the validator
     *
     * @param array $anyOf List of values. To pass the validation the value passed has to march one of them.
     * @param string $message Message returned on validation error
     * @return void
     */
    public function __construct(array $anyOf, $message = "Not equal to any of the preset values.")
    {
        $this->anyOf = $anyOf;
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
        if (in_array($value, $this->anyOf)) {
            return true;
        }
        $this->setError($this->message);
        return false;
    }
}
