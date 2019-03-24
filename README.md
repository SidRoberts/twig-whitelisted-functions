# Twig Whitelisted Functions

A down-right lazy way of whitelisting regular PHP functions within Twig.



[![Build Status](https://travis-ci.org/SidRoberts/twig-whitelisted-functions.svg?branch=master)](https://travis-ci.org/SidRoberts/twig-whitelisted-functions)
[![GitHub tag](https://img.shields.io/github/tag/sidroberts/twig-whitelisted-functions.svg?maxAge=2592000)]()



## Installation

```bash
composer require sidroberts/twig-whitelisted-functions
```

For more information on the available releases, check out the [Changelog](https://github.com/SidRoberts/twig-whitelisted-functions/releases).



## Usage

```php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Sid\TwigWhitelistedFunctions\WhitelistedFunctionsExtension;

$loader = new FilesystemLoader("views/");

$twig = new Environment($loader);



$whitelistedFunctions = [
    "ucfirst",
    "lcfirst",
    "number_format",
    // ...
];



$twig->addExtension(
    new WhitelistedFunctionsExtension(
        $whitelistedFunctions
    )
);
```

Within your Twig files, you can now use these functions:

```twig
{{ ucfirst('the first letter will be capitalised.') }}
```

For bonus points, set your whitelisted functions in a config file. ;)
