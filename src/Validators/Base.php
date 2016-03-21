<?php
/**
 * @author   Jacopo Scrinzi
 * @date     09/03/2016
 *
 * Base.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\Base
 *
 * Base Class for forms component validator
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Base
{
    /*
     * @var string Message returned on validation error
     */
    protected $message;
    
    /*
     * @var string Validator error
     */
    protected $error;

    /**
     * Build a new instance of the validator
     *
     * @param $message string Message returned on validation error
     * @return void
     */
    public function __construct($message = "This is a default error.")
    {
        $this->message = $message;
        $this->error = null;
    }

    protected function setError($error)
    {
        $this->error = $error;
    }

    /**
     * Return validation error
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Check if value passes the validation
     *
     * @param $value string Value to check
     * @return bool
     */
    public function check($value)
    {

    }
}
