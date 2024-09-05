<?php

namespace Tests\Unit;

use Zerotoprod\DynamicSetter\DynamicSetter;

class TestClassB
{
    use DynamicSetter;

    public $propertyA;
    public $propertyB;
}