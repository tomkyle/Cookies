#Cookies

Small and simple PHP library for dealing with cookies.

```php
<?php
use \tomkyle\Cookies\Cookie;
use \tomkyle\Cookies\RequestCookie;
use \tomkyle\Cookies\SendCookie;
use \tomkyle\Cookies\UnsetCookie;

// Most simple
$c1 = new Cookie( "foo", "bar" );

// Optionally set expiration:
$c1->setExpiration( new \DateTime( "14day" ));

// Fire cookie:
new SendCookie( $c1 );

// Retrieve cookie from next request:
$rc = new RequestCookie("foo");
echo $rc; // outputs "bar"
echo $rc->getValue(); // outputs "bar"

// Another example
$c2 = new Cookie( "any", "val", new \DateTime( "tomorrow" ) );
new SendCookie( $c2 );

// Delete from HTTP and $_COOKIE:
new UnsetCookie( $c2 );
```



##Installation via Composer

This library has no dependencies. Install from command line or `composer.json` file:

#####Command line
    
    composer require tomkyle/cookies

#####composer.json
    "require": {
        "tomkyle/cookies": "dev-master"
    }

##Classes Overview

- *interface* CookieInterface- *abstract* CookieAbstract- Cookie *extends* CookieAbstract- RequestCookie *extends* CookieAbstract- SendCookie- UnsetCookie


##Supported Attributes

- Cookie name
- Cookie value
- Expiration/Life time
- **Not supported:** Path
- **Not supported:** Domain
- **Not supported:** Secure (HTTPS only)
- **Not supported:** http-only protection

[PHP documentation on setcookie](http://www.php.net/manual/en/function.setcookie.php)


##Testing

Simply issue `phpunit` to run the test suites; you may have to `composer update`first.





