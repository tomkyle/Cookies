<?php
namespace tomkyle;

use \tomkyle\Cookies\Cookie;

class PHPUnit_Framework_TestCase extends \PHPUnit_Framework_TestCase {



    public function provideStringValues()
    {
        return array(
            array("Foo"),
            array("bar "),
            array(" John Deere ")
        );
    }

    public function provideCookieNames()
    {
        return array(
            array("Auth"),
            array("FOO"),
            array("kilo")
        );
    }

    public function provideExpirationValues()
    {
        return array(
            array( new \DateTime("now")),
            array( new \DateTime("14 day") ),
            array( new \DateTime("2016-12-24 12:00:00" ))
        );
    }
}
