Doo-CSRF - 
========

Doo csrf is a simple token generator to prevent csrf - cross site request forgery.

Installation -
============
To install the latest version of Doo csrf simply add it to your composer.json file in the require section:

```
"doowebdev/doo-csrf": "dev-master"
```

Once the package is installed, you need to initialize the Token class:

```
require 'vendor/autoload.php';

use DooCSRF\Token;

```
