# Twig Whitelisted Functions

A down-right lazy way of whitelisting regular PHP functions within Twig.



[![Build Status](https://travis-ci.org/SidRoberts/twig-whitelisted-functions.svg?branch=master)](https://travis-ci.org/SidRoberts/twig-whitelisted-functions)
[![GitHub tag](https://img.shields.io/github/tag/sidroberts/twig-whitelisted-functions.svg?maxAge=2592000)]()



## Installation

```bash
composer require sidroberts/twig-whitelisted-functions
```



## Usage

```php
use Twig_Loader_Filesystem;
use Twig_Environment;
use Sid\TwigWhitelistedFunctions\WhitelistedFunctionsExtension;

$loader = new Twig_Loader_Filesystem("views/");

$twig = new Twig_Environment($loader);



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

For bonus points, set your whitelisted functions in a config file. ;)
