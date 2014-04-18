<?php
namespace tests;

use \tomkyle\Cookies\Cookie;
use \tomkyle\Cookies\UnsetCookie;

class UnsetCookieTest extends \tomkyle\PHPUnit_Framework_TestCase {

    /**
     * @dataProvider provideStringValues
     */
    public function testUnsetCookieSuperglobal( $value )
    {
        $cookie = new Cookie("test", $value);

        new UnsetCookie( $cookie );

        $this->assertNull( $cookie->getValue() );
        $this->assertFalse( array_key_exists('test', $_COOKIE));

    }

    /**
     * @dataProvider provideStringValues
     */
    public function testUnsetCookieOverrideSuperglobal( $value )
    {
        $cookie = new Cookie("test", $value);

        $override = array("test" => $value);
        new UnsetCookie( $cookie, $override );

        $this->assertNull( $cookie->getValue() );
        $this->assertFalse( array_key_exists('test', $override));

    }

}
