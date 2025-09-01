# Zerotoprod\DynamicSetter

![](./art/logo.png)

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/dynamic-setter)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/dynamic-setter/test.yml?label=test)](https://github.com/zero-to-prod/dynamic-setter/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/dynamic-setter/backwards_compatibility.yml?label=backwards_compatibility)](https://github.com/zero-to-prod/dynamic-setter/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/dynamic-setter?color=blue)](https://packagist.org/packages/zero-to-prod/dynamic-setter/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/dynamic-setter?color=f28d1a)](https://packagist.org/packages/zero-to-prod/dynamic-setter)
[![GitHub repo size](https://img.shields.io/github/repo-size/zero-to-prod/dynamic-setter)](https://github.com/zero-to-prod/dynamic-setter)
[![License](https://img.shields.io/packagist/l/zero-to-prod/dynamic-setter?color=red)](https://github.com/zero-to-prod/dynamic-setter/blob/main/LICENSE.md)
[![Hits-of-Code](https://hitsofcode.com/github/zero-to-prod/dynamic-setter?branch=main)](https://hitsofcode.com/github/zero-to-prod/dynamic-setter/view?branch=main)

## Contents

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Documentation Publishing](#documentation-publishing)
    - [Automatic Documentation Publishing](#automatic-documentation-publishing)
- [Usage](#usage)
    - [Nested Objects](#nested-objects)
- [Local Development](./LOCAL_DEVELOPMENT.md)
- [Contributing](#contributing)

## Introduction

Fluently set class properties with dynamic methods.

## Requirements

- PHP 7.1 or higher.

## Installation

Install `Zerotoprod\DynamicSetter` via [Composer](https://getcomposer.org/):

```shell
composer require zero-to-prod/dynamic-setter
```

This will add the package to your project's dependencies and create an autoloader entry for it.

## Documentation Publishing

You can publish this README to your local documentation directory.

This can be useful for providing documentation for AI agents.

This can be done using the included script:

```bash
# Publish to default location (./docs/zero-to-prod/dynamic-setter)
vendor/bin/zero-to-prod-dynamic-setter

# Publish to custom directory
vendor/bin/zero-to-prod-dynamic-setter /path/to/your/docs
```

### Automatic Documentation Publishing

You can automatically publish documentation by adding the following to your `composer.json`:

```json
{
    "scripts": {
        "post-install-cmd": [
            "zero-to-prod-dynamic-setter"
        ],
        "post-update-cmd": [
            "zero-to-prod-dynamic-setter"
        ]
    }
}
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

## Contributing

Contributions, issues, and feature requests are welcome!
Feel free to check the [issues](https://github.com/zero-to-prod/dynamic-setter/issues) page if you want to contribute.

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.
