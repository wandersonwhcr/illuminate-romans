# illuminate-romans

Laravel Illuminate Romans Integration

[![Build Status](https://github.com/wandersonwhcr/illuminate-romans/actions/workflows/test.yml/badge.svg?branch=main)](https://github.com/wandersonwhcr/illuminate-romans/actions/workflows/test.yml?query=branch%3Amain)
[![Latest Stable Version](https://poser.pugx.org/wandersonwhcr/illuminate-romans/v/stable?format=flat)](https://packagist.org/packages/wandersonwhcr/illuminate-romans)
[![License](https://poser.pugx.org/wandersonwhcr/illuminate-romans/license?format=flat)](https://packagist.org/packages/wandersonwhcr/illuminate-romans)

## Description

This package provides a Laravel integration for
[Romans](https://github.com/wandersonwhcr/romans) library, providing tools to
filter `string` with a Roman number to `int` and vice-versa.

## Installation

This package uses Composer as default repository. You can install it adding the
name of package in `require` attribute of `composer.json`, pointing to the last
stable version.

```json
{
  "require": {
    "wandersonwhcr/illuminate-romans": "^3.0"
  }
}
```

## Usage

This package provides facades and helpers to use with Laravel projects. Also, it
was developed as a Laravel Package to automatically configure services inside
application.

### Facades

Illuminate Romans provides a couple of facades to convert a `string` with Roman
number to `int` and an Integer to a `string` that represents the input as Roman
number.

```php
use Illuminate\Romans\Support\Facades\IntToRoman as IntToRomanFacade;
use Illuminate\Romans\Support\Facades\RomanToInt as RomanToIntFacade;

$value = 'MCMXCIX';

$value = RomanToIntFacade::filter($value); // 1999
$value = IntToRomanFacade::filter($value); // MCMXCIX
```

### Helpers

Also, this package includes helpers as a bridge to facades.

```php
$value = 'MCMXCIX';

$value = roman_to_int($value); // 1999
$value = int_to_roman($value); // MCMXCIX
```

## Development

You can use Docker Compose to build an image and run a container to develop and
test this package.

```bash
docker-compose build
docker-compose run --rm romans composer install
docker-compose run --rm romans composer test
```

## License

This package is opensource and available under MIT license described in
[LICENSE](https://github.com/wandersonwhcr/laravel-romans/blob/main/LICENSE).
