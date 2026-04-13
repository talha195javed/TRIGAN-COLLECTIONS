<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Determine Application Base Path
|--------------------------------------------------------------------------
|
| Supports two deployment layouts:
| 1. Standard:  public/index.php  →  ../  (app root one level up)
| 2. Namecheap: entire project inside public_html, index.php at root
|    In this case bootstrap/app.php is in the same directory.
|
*/

if (file_exists(__DIR__.'/../bootstrap/app.php')) {
    // Standard layout: public/ is a subfolder of the project
    $basePath = __DIR__.'/..';
} else {
    // Namecheap flat layout: everything is in public_html
    $basePath = __DIR__;
}

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
*/

if (file_exists($maintenance = $basePath.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/

require $basePath.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
*/

$app = require_once $basePath.'/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Override Public Path for Flat Layout
|--------------------------------------------------------------------------
|
| In the Namecheap flat layout, the public path is the same directory
| as index.php (public_html/), not public_html/public/.
|
*/

if ($basePath === __DIR__) {
    $app->bind('path.public', function () {
        return __DIR__;
    });
}

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
