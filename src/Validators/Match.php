<?php
/**
 * @author   Jacopo Scrinzi
 * @date     09/03/2016
 *
 * Match.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\Match
 *
 * Check that the form value passed match the vale preset
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Match extends Base
{
    /*
     * @var string Value to match with the one passed int the validator 
     */
    private $match;

    /**
     * Build a new instance of the validator
     *
     * @param $match string Value to match with the one passed int the validator
     * @param $message string Message returned on validation error
     * @return void
     */
    public function __construct($match, $message = "Value Mismatch.")
    {
        $this->match = $match;
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
        if ($value === $this->match) {
            return true;
        }
        $this->setError($this->message);
        return false;
    }
}
