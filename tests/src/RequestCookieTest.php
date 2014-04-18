<?php
namespace tests;

use \tomkyle\Cookies\RequestCookie;

class RequestCookieTest extends \tomkyle\PHPUnit_Framework_TestCase {

    public function testSimpleInstantiation()
    {
        $f = new RequestCookie("foo");
        $this->assertInstanceOf('\tomkyle\Cookies\CookieInterface', $f);
        $this->assertInstanceOf('\tomkyle\Cookies\CookieAbstract', $f);
    }

    /**
     * @dataProvider provideStringValues
     */
    public function testSuperGlobalCookieValue( $value )
    {
        $_COOKIE['test'] = $value;
        $f = new RequestCookie("test");
        $this->assertEquals( $value, $f->getValue());
        $this->assertEquals( $value, $f);
        $this->assertEquals( $value, $f->__toString());
    }

    /**
     * @dataProvider provideStringValues
     */
    public function testOverrideSuperGlobalCookieValue( $value )
    {
        $input = array('test' => $value);
        $f = new RequestCookie("test", null, $input);
        $this->assertEquals( $value, $f->getValue());
        $this->assertEquals( $value, $f);
        $this->assertEquals( $value, $f->__toString());
    }


}
