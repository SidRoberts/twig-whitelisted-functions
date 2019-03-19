<?php

namespace MyTunes\Tests\Unit\Controller;

use Twig_Loader_Array;
use Twig_Environment;

use Sid\TwigWhitelistedFunctions\WhitelistedFunctionsExtension;

class WhitelistedFunctionsExtensionTest extends \Codeception\TestCase\Test
{
    protected function _before()
    {
    }

    protected function _after()
    {
    }



    /**
     * @expectedException Twig_Error_Syntax
     */
    public function testUndefinedFunctionThrowsException()
    {
        $loader = new Twig_Loader_Array(
            [
                "template" => "{{ lcfirst(variable) }}",
            ]
        );

        $twig = new Twig_Environment($loader);



        $twig->addExtension(
            new WhitelistedFunctionsExtension(
                [
                    "ucfirst",
                ]
            )
        );



        $twig->render(
            "template",
            [
                "variable" => "THE STRING",
            ]
        );
    }



    public function testDefinedFunction()
    {
        $loader = new Twig_Loader_Array(
            [
                "template" => "{{ ucfirst(variable) }}",
            ]
        );

        $twig = new Twig_Environment($loader);



        $twig->addExtension(
            new WhitelistedFunctionsExtension(
                [
                    "ucfirst",
                ]
            )
        );



        $actual = $twig->render(
            "template",
            [
                "variable" => "the string",
            ]
        );



        $this->assertEquals(
            "The string",
            $actual
        );
    }
}
