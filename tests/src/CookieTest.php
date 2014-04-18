<?php
namespace tests;

use \tomkyle\Cookies\Cookie;

class CookieTest extends \tomkyle\PHPUnit_Framework_TestCase {

    public function testSimpleInstantiation()
    {
        $cookie = new Cookie("foo");
        $this->assertInstanceOf('\tomkyle\Cookies\CookieInterface', $cookie);
        $this->assertInstanceOf('\tomkyle\Cookies\CookieAbstract', $cookie);
    }

    /**
     * @dataProvider provideCookieNames
     */
    public function testNameInterceptor( $name )
    {
        $cookie = new Cookie( $name );
        $this->assertEquals($name, $cookie->getName());

        $var_name = $name . $name;
        $cookie->setName( $var_name );
        $this->assertEquals($var_name, $cookie->getName());
    }




    /**
     * @dataProvider provideStringValues
     */
    public function testValueInterceptor( $value )
    {
        $cookie1 = new Cookie( "test" );
        $cookie1->setValue( $value );
        $this->assertEquals($value, $cookie1->getValue());
        $this->assertEquals($value, $cookie1);
        $this->assertEquals($value, $cookie1->__toString());
    }


    /**
     * @dataProvider provideStringValues
     */
    public function testValueInterceptorOnCtor( $value )
    {
        $cookie = new Cookie( "test2", $value );
        $this->assertEquals($value, $cookie->getValue());
        $this->assertEquals($value, $cookie);
        $this->assertEquals($value, $cookie->__toString());
    }



    /**
     * @dataProvider provideExpirationValues
     */
    public function testExpirationInterceptor( $expire )
    {
        $cookie = new Cookie( "test" );
        $cookie->setExpiration( $expire );
        $this->assertEquals($expire, $cookie->getExpiration());
    }

    /**
     * @dataProvider provideExpirationValues
     */
    public function testExpirationInterceptorOnCtor( $expire )
    {
        $cookie = new Cookie( "test", "value", $expire );
        $this->assertEquals($expire, $cookie->getExpiration());
    }





    /**
     * @dataProvider provideStringValues
     */
    public function testFluentInterfaceOnValue( $value )
    {
        $cookie = new Cookie( "test" );
        $fluent = $cookie->setValue( $value );
        $this->assertInstanceOf('\tomkyle\Cookies\CookieInterface', $fluent);
        $this->assertInstanceOf('\tomkyle\Cookies\CookieAbstract',  $fluent);
    }

    /**
     * @dataProvider provideCookieNames
     */
    public function testFluentInterfaceOnName( $name )
    {
        $cookie = new Cookie( $name );
        $fluent = $cookie->setName( $name );
        $this->assertInstanceOf('\tomkyle\Cookies\CookieInterface', $fluent);
        $this->assertInstanceOf('\tomkyle\Cookies\CookieAbstract',  $fluent);
    }

    /**
     * @dataProvider provideExpirationValues
     */
    public function testFluentInterfaceOnExpiration( $expire )
    {
        $cookie = new Cookie( "test", "value" );
        $fluent = $cookie->setExpiration( $expire );
        $this->assertInstanceOf('\tomkyle\Cookies\CookieInterface', $fluent);
        $this->assertInstanceOf('\tomkyle\Cookies\CookieAbstract',  $fluent);
    }



}
