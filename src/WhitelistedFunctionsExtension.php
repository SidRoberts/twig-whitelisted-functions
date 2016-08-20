<?php

namespace Sid\TwigWhitelistedFunctions;

use Twig_Extension;
use Twig_SimpleFunction;

class WhitelistedFunctionsExtension extends Twig_Extension
{
    /**
     * @var array
     */
    protected $functionNames;



    public function __construct(array $functionNames)
    {
        $this->functionNames = $functionNames;
    }



    public function getFunctions()
    {
        $functions = [];

        foreach ($this->functionNames as $name) {
            $functions[] = new Twig_SimpleFunction($name, $name);
        }

        return $functions;
    }

    public function getName()
    {
        return "whitelistedFunctions";
    }
}
