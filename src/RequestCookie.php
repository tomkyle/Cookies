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
 * RequestCookie
 *
 * Represents a cookie sent along with the current request.
 * For instantiation, just pass in its name and,
 * optionally, a PHP filter constant.
 *
 * By default, `FILTER_SANITIZE_STRING` will be used.
 */
class RequestCookie extends CookieAbstract implements CookieInterface
{

    /**
     * @param string $name   Request cookie name
     * @param int    $filter PHP Filter constant, default: `FILTER_SANITIZE_STRING`
     */
    public function __construct( $name, $filter = \FILTER_SANITIZE_STRING, &$input = array() )
    {
        $this->setName( $name );

        if (is_null( $filter )) {
            $filter = \FILTER_SANITIZE_STRING;
        }
        $this->setValue( $this->getFiltered( $input ?: $_COOKIE, $name, $filter ) );
    }


    public function __toString()
    {
        return $this->getValue() ?: '';
    }


    protected function getFiltered( $input, $field, $filter = \FILTER_SANITIZE_STRING)
    {
        return ( isset($input[ $field ]))
        ? filter_var( $input[ $field ], $filter )
        : null;
    }



}
