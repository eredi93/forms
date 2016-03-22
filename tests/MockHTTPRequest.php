<?php

/**
 * @author   Jacopo Scrinzi
 * @date     22/03/2016
 *
 * MockHTTPRequest.php
 */

class MockHTTPRequest
{
    public static $csrf_name = "csrf56f1430f5a1d9";
    public static $csrf_value = "e83b1140dfc721c791037ed201f756fa";
    public $params;

    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    public function getQueryParams()
    {
        return $this->params;
    }

    public function getParsedBody()
    {
        return $this->params;
    }

    public function getAttribute($name)
    {
        if ($name == "csrf_name") {
            return self::$csrf_name;
        }
        if ($name == "csrf_value") {
            return self::$csrf_value;
        }
        return null;
    }
}