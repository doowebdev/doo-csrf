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
     
           View::display('path/to/a/view', $this->data );//the token variable is past through to the view via the                                                                    $this->data array.
     }


}

```
In your view add the $token variable in a hidden input within your form, example:
```
<form action="/path/to/post/route/or/url" method="post">

<label> someTitle</label>
<input type="text" name ="someName">

<input type="hidden" name="token" value="{{ token }}"> 
<!-- if you using a template engine like Twig, wrap it in the template brackets ( or whatever is given), if not use good old php <?php echo $token; ?> -->

<button type="submit"></button>

</form>

```

And in the controller or file that will recieve the post data:

```
use DooCSRF\Token; 

if( Token::check( $_POST['token'] ) ){

     //Do somthing. Do database inserts etc..
     (code placed here is protected)
}

```

### Thats it, nice and easy!
