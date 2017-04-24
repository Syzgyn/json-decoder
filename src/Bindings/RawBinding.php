<?php

namespace Karriere\JsonDecoder\Bindings;

use Karriere\JsonDecoder\Binding;
use Karriere\JsonDecoder\JsonDecoder;

class RawBinding implements Binding
{
    /**
     * @var string
     */
    private $property;

    /**
     * RawBinding constructor.
     *
     * @param string $property
     */
    public function __construct($property)
    {
        $this->property = $property;
    }

    /**
     * executes the defined binding method on the class instance.
     *
     * @param JsonDecoder $jsonDecoder
     * @param mixed       $jsonData
     * @param mixed       $instance    the class instance to bind to
     *
     * @return mixed
     */
    public function bind($jsonDecoder, $jsonData, $instance)
    {
        if (array_key_exists($this->property, $jsonData)) {
            $instance->{$this->property} = $jsonData[$this->property];
        }
    }

    /**
     * @return string the name of the property to bind
     */
    public function property()
    {
        return $this->property;
    }
}
