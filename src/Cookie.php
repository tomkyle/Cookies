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
 * Cookie
 *
 * Represents a Cookie that can be set and sent.
 * These typical cookie attributes are supported:
 *
 * - Cookie name
 * - Cookie value
 * - Expiration/Life time
 */
class Cookie extends CookieAbstract implements CookieInterface
{

    /**
     * @param string   $name    Cookie name
     * @param mixed    $value   Cookie value, default: `null`
     * @param DateTime $expire `DateTime` instance, default: `null`
     *
     * @uses setName()
     * @uses setValue()
     * @uses setValidUntil()
     */
    public function __construct($name, $value = null, \DateTime $expire = null)
    {
        $this->setName(  $name );

        if (!is_null( $value )) {
            $this->setValue( $value );
        }

        if (!is_null( $expire )) {
            $this->setExpiration( $expire );
        }

    }


    public function __toString()
    {
        return $this->getValue() ?: '';
    }




}
