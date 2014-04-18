<?php
/**
 * This file is part of tomkyle/cookies
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
 * SendCookie
 *
 * Sends (or stores, respectively) the cookie given:
 *
 * - Stores in `$_COOKIE` Superglobal
 * - Sends via `setcookie`
 *
 * Currently, only these typical cookie attributes are supported:
 *
 * - Cookie name
 * - Cookie value
 * - Expiration/Life time
 *
 * Not supported are, c.f. PHP documentation on setcokie:
 *
 * - Path
 * - Domain
 * - Secure HTTPS only
 * - httponly protection.
 */
class SendCookie
{


    public function __construct( CookieInterface $cookie, &$target_array = null)
    {
        $name  = $cookie->getName();
        $value = $cookie->getValue();

        $expire = $cookie->getExpiration();
        $expire = $expire ? $expire->getTimestamp() : null;

        // Populate current superglobals (or overriden one)
        if (is_array($target_array)) {
            $target_array[ $name ] = $value;
        }
        else {
            $_COOKIE[ $name ] = $value;
        }

        // Unset over HTTP
        setcookie( $name, $value, $expire );
    }


}
