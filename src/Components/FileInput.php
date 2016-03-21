<?php
/**
 * @author   Jacopo Scrinzi
 * @date     21/03/2016
 *
 * FileInput.php
 */


namespace Forms\Components;

/**
 * \Forms\Components\FileInput
 *
 * Form File Input
 * Extends Input Class
 *
 * @package    Forms
 * @author     Jacopo Scrinzi <scrinzi.jacopo@gmail.com>
 */
class FileInput extends Input
{

    /**
     * Set data accepted
     *
     * @return $this
     */
    public function setAccept($accepted)
    {
        $this->attributes['accept'] = $accepted;
        return $this;
    }

    /**
     * Set multiple
     *
     * @return $this
     */
    public function setMultiple()
    {
        $this->attributes['multiple'] = "multiple";
        return $this;
    }

    /**
     * Build a new instance of the Text Input
     *
     * @return void
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->attributes['type'] = "file";
    }
}