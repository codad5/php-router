# PHP Router

PHP-Router is a modern, lightning-fast, and adaptable composer package that provides express-style routing in PHP.

This website is powered by this package -> [View site](https://phprouter.herokuapp.com/)

## Installation

```bash
composer require trulyao/php-router
```

### Update .htaccess file

```
Options +FollowSymLinks
RewriteEngine On
RewriteCond %{REQUEST_URI} !=/index.php
RewriteCond %{REQUEST_URI} !.*\.png$ [NC]
RewriteCond %{REQUEST_URI} !.*\.jpg$ [NC]
RewriteCond %{REQUEST_URI} !.*\.css$ [NC]
RewriteCond %{REQUEST_URI} !.*\.gif$ [NC]
RewriteCond %{REQUEST_URI} !.*\.js$ [NC]
RewriteRule .* /index.php
```

You could also download these files and use them directly.

## Features

- Open source
- Fast and easy-to-use syntax
- Provides request and response objects
- Supports dynamic routing like `/:id` or `/:id/:name`
- Supports 4 **major** HTTP methods (GET, POST, PUT, DELETE)
- Uses callbacks to handle requests
- Supports custom 404 and 500 error pages
- Supports redirection
- Serves static files, JSON and more
- Helper functions for common tasks like sending JSON, setting status codes etc.

## Usage

`index.php`

```php
<?php

# Your autoload file
require(__DIR__ . '/../vendor/autoload.php');

use \Trulyao\PhpRouter\Router as Router;

# Create a new instance
$router = new Router(__DIR__."/views", "demo");

# GET route
$router->get("/", function($req, $res) {
    return $res->status(200)->send("<h1>Hello World</h1>"); // sends html response
});

# POST route
$router->post("/", function($req, $res) {
   return $res->status(200)->send([
       "message" => "Hello World"
   ]); // sends json response
});

# Start the router - very important!
$router->serve();

?>
```

`/views` - The directory where your views/controllers are located.

`/demo` - This is the base url for your application eg. `api` for `/api/*` or `v1` for `/v1/*`.

## The `$req` object

The `$req` object contains the request data, it also has helper methods for accessing this data.

- `query($name)` - Returns the query string value for the given name or all query string values if no name is given.

- `body($name)` - Returns the body value for the given name or all body values if no name is given.

- `params($name)` - Returns the params value for the given name or all file values if no name is given.
- `path()` - Get current full request path.

> More methods will be added in the future.

## The `$res` object

The `$res` object is used to control the response and holds data related to responses and just like the request object, it has methods you can use.

- `error($message, $status)` - Send a JSON error response.
- `send($data)` - Send a JSON/HTML response; automatically detected.
- `json($data)` - Send a JSON response.
- `use($file)` - Render a view or use a controller file - to use the request and response objects in your controller, use the include directive instead in a callback.
- `redirect($path)` - Redirect to another path - eg. `/example/login`
- `status($status)` - Set the status code (defaults to 200, optional)

> More methods will also be added in the future.

You can access these any functions outside your index file too by using the namespace `Trulyao\PhpRouter\Helper`

## Error Pages

You can easily add a custom 404 and 500 page by creating a file in the `/views` directory (or wherever your base path is; where your controllers or views are) called `404.php` and `500.php`

## Contribute

- Fork the repository on GitHub
- Add your own code
- Create a pull request with your changes highlighted
- For more information, contact me [here](https://twitter.com/trulyao)

> This documentation will be updated as soon as new features and methods are added to the package.
