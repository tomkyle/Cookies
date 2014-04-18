<?php
namespace tests;

use \tomkyle\Cookies\Cookie;
use \tomkyle\Cookies\SendCookie;



// Suppress output while working with HTTP setcookie
ob_start();



class SendCookieTest extends \tomkyle\PHPUnit_Framework_TestCase {

    /**
     * @dataProvider provideStringValues
     */
    public function testSendCookieSuperglobal( $value )
    {
        $cookie = new Cookie("test", $value);

        new SendCookie( $cookie );

        $this->assertEquals( $_COOKIE['test'], $cookie->getValue());
        $this->assertEquals( $_COOKIE['test'], $value);

    }

    /**
     * @dataProvider provideStringValues
     */
    public function testSendCookieOverrideSuperglobal( $value )
    {
        $cookie = new Cookie("test", $value);

        $override = array();
        new SendCookie( $cookie, $override );

        $this->assertEquals( $override['test'], $cookie->getValue());
        $this->assertEquals( $override['test'], $value);

    }

}
