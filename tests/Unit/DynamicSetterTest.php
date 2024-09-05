<?php

namespace Tests\Unit;

use Tests\TestCase;
use Zerotoprod\DynamicSetter\DynamicSetter;

class DynamicSetterTest extends TestCase
{

    /**
     * @test
     *
     * @see DynamicSetter
     */
    public function class_instantiation(): void
    {
        $instance = TestClassA::new();
        $this->assertInstanceOf(TestClassA::class, $instance, 'Failed to instantiate TestClassA using DynamicSetter.');
    }

    /**
     * @test
     *
     * @see DynamicSetter
     */
    public function dynamic_setter_sets_property(): void
    {
        $instance = TestClassA::new()->set_propertyA('Value A');
        $this->assertEquals('Value A', $instance->propertyA, 'Dynamic setter failed to set propertyA.');
    }

    /**
     * @test
     *
     * @see DynamicSetter
     */
    public function chaining_multiple_setters(): void
    {
        $instance = TestClassA::new()
            ->set_propertyA('Value A')
            ->set_propertyB('Value B');

        $this->assertEquals('Value A', $instance->propertyA, 'Dynamic setter failed to set propertyA.');
        $this->assertEquals('Value B', $instance->propertyB, 'Dynamic setter failed to set propertyB.');
    }

    /**
     * @test
     *
     * @see DynamicSetter
     */
    public function multiple_class_instances_work_independently(): void
    {
        $instanceA = TestClassA::new()->set_propertyA('Class A Value');
        $instanceB = TestClassB::new()->set_propertyC('Class B Value');

        $this->assertEquals('Class A Value', $instanceA->propertyA, 'TestClassA failed to manage its propertyA independently.');
        $this->assertEquals('Class B Value', $instanceB->propertyC, 'TestClassB failed to manage its propertyC independently.');
    }

    /**
     * @test
     *
     * @see DynamicSetter
     */
    public function new_instance_resets_properties(): void
    {
        $instanceA = TestClassA::new()->set_propertyA('First Value');
        $this->assertEquals('First Value', $instanceA->propertyA, 'Initial property value is not set correctly.');

        $newInstanceA = TestClassA::new();
        $this->assertNull($newInstanceA->propertyA, 'New instance should reset the property to null.');
    }

    /**
     * @test
     *
     * @see DynamicSetter
     */
    public function method_not_found(): void
    {
        $this->expectException(\Error::class);
        $instance = TestClassA::new();
        $instance->nonExistentMethod();
    }
}