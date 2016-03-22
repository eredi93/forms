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
     * @param string $accepted Accepted file format
     * @return FileInput $this
     */
    public function setAccept($accepted)
    {
        $this->attributes['accept'] = $accepted;
        return $this;
    }

    /**
     * Set multiple
     *
     * @return FileInput $this
     */
    public function setMultiple()
    {
        $this->attributes['multiple'] = "multiple";
        return $this;
    }

    /**
     * Build a new instance of the Text Input
     * 
     * @param string $name Attribute name of the form component
     * @return void
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->attributes['type'] = "file";
    }
}
