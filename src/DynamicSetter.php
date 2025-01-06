<?php

namespace Zerotoprod\DynamicSetter;

trait DynamicSetter
{

    /**
     * Instantiates this class.
     */
    public static function new(...$args): self
    {
        return new self(...$args);
    }

    private $attributes = [];

    public function __set(string $name, $value): void
    {
        $this->attributes[$name] = $value;
    }

    public function __get(string $name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function __isset($name)
    {
        return isset($this->attributes[$name]);
    }

    public function __call($name, $arguments)
    {
        // For "set_propertyC('some value')", $name = "set_propertyC"
        // substr($name, 4) = "propertyC"
        if (!strpos($name, 'set_')) {
            // Use __set() internally
            $propertyName = substr($name, 4);
            $this->$propertyName = $arguments[0] ?? null;
            return $this;
        }

        throw new \BadMethodCallException("Method $name does not exist.");
    }
}