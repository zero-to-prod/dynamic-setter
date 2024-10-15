# `Zerotoprod\DynamicSetter`

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/dynamic-setter)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/dynamic-setter/phpunit.yml?label=tests)](https://github.com/zero-to-prod/dynamic-setter/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/dynamic-setter?color=blue)](https://packagist.org/packages/zero-to-prod/dynamic-setter/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/dynamic-setter?color=f28d1a)](https://packagist.org/packages/zero-to-prod/dynamic-setter)
[![GitHub repo size](https://img.shields.io/github/repo-size/zero-to-prod/dynamic-setter)](https://github.com/zero-to-prod/dynamic-setter)
[![License](https://img.shields.io/packagist/l/zero-to-prod/dynamic-setter?color=red)](https://github.com/zero-to-prod/dynamic-setter/blob/main/LICENSE.md)


Fluently set class properties with dynamic methods.

## Installation

To install this package run composer install:

```shell
composer require zerotoprod/dynamic-setter
```

## Usage
The `DynamicSetter` trait allows you to easily create class instances and dynamically set properties through method chaining. 
It provides a simple way to manage object instantiation and property setting with `set_*` methods.

To use the `DynamicSetter` trait, include it in your class and define the properties you want to set dynamically.
```php
use Zerotoprod\StreamContext\DynamicSetter;

class User
{
    use DynamicSetter;

    public $name;
    public $email;
}

$user = User::new()
    ->set_name('John Doe')
    ->set_email('john.doe@example.com');

echo $user->name;  // Output: John Doe
echo $user->email; // Output: john.doe@example.com
```

### Nested Objects

You can also use the DynamicSetter trait in classes that contain other objects, allowing you to set properties in a nested structure.

```php
class Address
{
    use DynamicSetter;

    public $city;
    public $postalCode;
}

class Customer
{
    use DynamicSetter;

    public $name;
    public $address;
}

$customer = Customer::new()
    ->set_name('Jane Doe')
    ->set_address(
        Address::new()
            ->set_city('New York')
            ->set_postalCode('10001')
    );

echo $customer->name;                   // Output: Jane Doe
echo $customer->address->city;          // Output: New York
echo $customer->address->postalCode;    // Output: 10001
```