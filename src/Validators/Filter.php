<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * Filter.php
 */


namespace Forms\Validators;

/**
 * \Forms\Validators\Filter
 *
 * Base Class for Filter based Validators
 * Extends Base Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class Filter extends Base
{
    /*
     * @var Flag PHP filter Flag eg FILTER_VALIDATE_URL
     */
    protected $filterFlag;

    /*
     * @var Flag PHP filter Flag eg FILTER_VALIDATE_URL
     */
    protected $filterOptions;

    /**
     * Check if value passes the validation
     *
     * @param string $value Value to check
     * @return bool
     */
    public function check($value)
    {
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
