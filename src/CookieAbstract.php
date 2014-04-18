<?php
/**
 * This file is part of tomkyle/cookies.
 *
 * Copyright (c) 2014 Carsten Witt
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace tomkyle\Cookies;


/**
 * CookieAbstract
 *
 * Implements the interceptors prescribed by the CookieInterface.
 */
abstract class CookieAbstract implements CookieInterface
{

    /**
     * @var string
     */
    public $name;


    /**
     * @var mixed
     */
    public $value;


    /**
     * @var \DateTime
     */
    public $expire;





    /**
     * @param  string $value
     * @return CookieAbstract Fluent Interface
     */
    public function setValue( $value )
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }




    /**
     * @param  string $name
     * @return CookieAbstract Fluent Interface
     */
    public function setName( $name )
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }



    /**
     * @param /DateTime $expire Expiration `DateTime` instance
     * @return CookieAbstract Fluent Interface
     */
    public function setExpiration( \DateTime $expire = null)
    {
        $this->expire = $expire;
        return $this;
    }

    public function getExpiration()
    {
        return $this->expire;
    }


}
