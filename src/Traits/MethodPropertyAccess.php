<?php

namespace Iatstuti\Support\Traits;

/**
 * Allow access to class methods as properties.
 *
 * @package     Iatstuti\Support
 * @copyright   2016 IATSTUTI
 * @author      Michael Dyrynda <michael@iatstuti.net>
 */
trait MethodPropertyAccess
{

    /**
     * Overload the __isset method to correctly handle isset request.
     *
     * @return bool
     */
    public function __isset($key)
    {
        return method_exists($this, $key);
    }


    /**
     * Overload the __get method to allow property access of methods.
     *
     * @param  string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->{$key}();
        }
    }
}
