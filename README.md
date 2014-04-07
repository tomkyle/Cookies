#Cookies

Small PHP library for dealing with cookies.

##Installation

This library has no dependencies. Install from command line or `composer.json` file:

#####Command line
    
    composer require tomykle/cookies

#####composer.json
    "require": {
        "tomkyle/cookies": "dev-master"
    }

##Classes Overview

- *interface* CookieInterface- *abstract* CookieAbstract- Cookie *extends* CookieAbstract- RequestCookie *extends* CookieAbstract- SendCookie- UnsetCookie


##Testing
There is a PHPUnit test suite boilerplate in the `tests` directory, neither used nor implemented. Yet.






