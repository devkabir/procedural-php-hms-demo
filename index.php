<?php
/**
 * The main file of the application. It is the file that is called when the
 * application is accessed. It is the file that decides which controller to include.
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */


/* Setting the error reporting. */
$env = 'development';
//$env = 'production';
if ($env === 'development') {
    @ini_set('display_errors', true);
    @ini_set('display_startup_errors', true);
    @ini_set('error_reporting', -1);
} else {
    @ini_set('display_errors', false);
    @ini_set('display_startup_errors', false);
    @ini_set('error_reporting', E_ALL);
    @ini_set('error_log', true);
}

/* Defining the path to the controllers, models, views and core folders. */
$core = __DIR__ . '/core';
$models = __DIR__ . '/model';
$views = __DIR__ . '/view';
$controllers = __DIR__ . '/controller';

/* Getting the request URI from the server. */
$request_uri = $_SERVER['REQUEST_URI'];

/* Getting the request method from the server. */
$request_method = $_SERVER['REQUEST_METHOD'];

/* Including the core files. */
require_once $core . '/view.php';
require_once $core . '/form.php';
require_once $core . '/time.php';
require_once $core . '/response.php';
require_once $core . '/database.php';
require_once $core . '/validation.php';
require_once $core . '/notification.php';


/* Checking the request URI and including the appropriate controller. */
if (strpos($request_uri, '/admin') === 0) {
    require $controllers . '/admin/index.php';
} elseif (strpos($request_uri, '/patient') === 0) {
    require $controllers . '/patient/index.php';
} elseif (strpos($request_uri, '/doctor') === 0) {
    require $controllers . '/doctor/index.php';
} else {
    require $controllers . '/website/index.php';
}