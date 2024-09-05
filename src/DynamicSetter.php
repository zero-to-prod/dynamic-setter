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

    public function __call($name, $arguments)
    {
        if (strpos($name, 'set_') === 0) {
            $this->{substr($name, 4)} = $arguments[0];

            return $this;
        }

        return $this->$name(...$arguments);
    }
}