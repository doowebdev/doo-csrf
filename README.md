Doo-CSRF - 
========

Doo csrf is a simple random token generator for PHP Scripts to prevent csrf - cross site request forgery.

Installation -
============
To install the latest version of Doo csrf simply add it to your composer.json file in the require section:

```
"doowebdev/doo-csrf": "dev-master"
```

Once the package is installed, you need to initialize the Token class:

```PHP
require 'vendor/autoload.php';

use DooCSRF\Token;

```

The static methods used to generate and check the random token:
```PHP 

Token::generate(); //Generates a random token string.

Token::check( PLACE-$_POST-NAME-HERE );// Checks if random token is valid.

```

How to Use -
==========
Assuming you are using php classes in your application (you can also use in php procedural code), use the following as an example:

In your base controller:

```PHP

use DooCSRF\Token;

class BaseController{
     
      protected $data = []; // assign $data to an empty array.

      public function __construct(){
      
          //assign the token static method to a varibale, in this case it's the token variable create by the data array
           $this->data['token'] = Token::generate();
      
      }

}


class SomeclassController extends BaseController {

     
     public function someMethod(){
     
           View::display('path/to/a/view', $this->data );//the token variable is past through to the view via the $this->data array.
     }


}

```
In your view add the $token variable in a hidden input within your form, example:

```HTML
<form action="/path/to/post/route/or/url" method="post">

<label> someTitle</label>
<input type="text" name ="someName">

<input type="hidden" name="token" value="{{ token }}"> 
<!-- if you using a template engine like Twig, wrap it in the template brackets ( or whatever is given), if not use good old php <?php echo $token; ?> -->

<button type="submit"></button>

</form>

```

And in a controller method or file that will recieve the post data:

```PHP
use DooCSRF\Token; 

if( Token::check( $_POST['token'] ) ){

     //Protected area. Do somthing,  database inserts etc..
}

```

### Thats it, nice and easy!
