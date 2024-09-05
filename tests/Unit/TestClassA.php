<?php

namespace Tests\Unit;

use Zerotoprod\DynamicSetter\DynamicSetter;

class TestClassA
{
    use DynamicSetter;

    public $propertyA;
    public $propertyB;
}