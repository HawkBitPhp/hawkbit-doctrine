# Hawkbit Persistence

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]
[![Coverage Status][ico-coveralls]][link-coveralls]

Persistence layer for Hawkbit PSR-7 Micro PHP framework.
Hawkbit Persitence uses factories of `dasprid/container-interop-doctrine` and wraps them with in a PersistenceService

## Install

### Using Composer

Hawkbit Persistence is available on [Packagist][link-packagist] and can be installed using [Composer](https://getcomposer.org/). This can be done by running the following command or by updating your `composer.json` file.

```bash
composer require Hawkbit
```

composer.json

```javascript
{
    "require": {
        "hawkbit/persistence": "~1.0"
    }
}
```

Be sure to also include your Composer autoload file in your project:

```php
<?php

require __DIR__ . '/vendor/autoload.php';
```

### Downloading .zip file

This project is also available for download as a `.zip` file on GitHub. Visit the [releases page](https://github.com/hawkbit/persistence/releases), select the version you want, and click the "Source code (zip)" download button.

### Requirements

The following versions of PHP are supported by this version.

* PHP 5.5
* PHP 5.6
* PHP 7.0
* HHVM

## Setup

Setup with an existing application configuration

```php
<?php

use \Hawkbit\Application;
use \Hawkbit\Persistence\PersistenceService;
use \Hawkbit\Persistence\PersistenceServiceProvider;

$app = new Application(require_once __DIR__ . '/config.php');
$persistenceService = new PersistenceService();

// you could access persistence configuration from application configuration
// optional set config accessor, default is persistence
$persistenceService->setConfigAccessor('custom.database');

// prefers configuration from application config
// this option is enabled by default
$persistenceService->preferConfiguration(true);

$app->register(new PersistenceServiceProvider($persistenceService));
```


Access persistence service in controller

```php
<?php

use \Hawkbit\Persistence\PersistenceServiceInterface;

class MyController{
    
    /**
     * @var \Hawkbit\Persistence\PersistenceServiceInterface 
     */
    private $persitence = null;
    
    public function __construct(PersistenceServiceInterface $persistence){
        $this->persistence = $persistence;
    }
}

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email <mjls@web.de> instead of using the issue tracker.

## Credits

- [Marco Bunge](https://github.com/mbunge)
- [All contributors](https://github.com/hawkbit/persistence/graphs/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/hawkbit/persistence.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/HawkBitPhp/hawkbit-persistence/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/hawkbit/persistence.svg?style=flat-square
[ico-coveralls]: https://img.shields.io/coveralls/HawkBitPhp/hawkbit-persistence/master.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/hawkbit/hawkbit
[link-travis]: https://travis-ci.org/HawkBitPhp/hawkbit
[link-downloads]: https://packagist.org/packages/hawkbit/hawkbit
[link-author]: https://github.com/mbunge
[link-contributors]: ../../contributors
[link-coveralls]: https://coveralls.io/github/HawkBitPhp/hawkbit
