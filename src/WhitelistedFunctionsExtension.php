<?php

namespace Sid\TwigWhitelistedFunctions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class WhitelistedFunctionsExtension extends AbstractExtension
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
            $functions[] = new TwigFunction($name, $name);
        }

        return $functions;
    }

    public function getName()
    {
        return "whitelistedFunctions";
    }
}
