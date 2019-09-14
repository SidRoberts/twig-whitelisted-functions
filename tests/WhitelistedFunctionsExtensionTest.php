<?php

namespace MyTunes\Tests\Unit\Controller;

use Sid\TwigWhitelistedFunctions\WhitelistedFunctionsExtension;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class WhitelistedFunctionsExtensionTest extends \Codeception\TestCase\Test
{
    protected function _before()
    {
    }

    protected function _after()
    {
    }



    public function testUndefinedFunctionThrowsException()
    {
        $this->expectException(
            \Twig\Error\SyntaxError::class
        );



        $loader = new ArrayLoader(
            [
                "template" => "{{ lcfirst(variable) }}",
            ]
        );

        $twig = new Environment($loader);



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
        $loader = new ArrayLoader(
            [
                "template" => "{{ ucfirst(variable) }}",
            ]
        );

        $twig = new Environment($loader);



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
