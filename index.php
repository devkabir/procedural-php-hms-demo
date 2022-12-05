<?php
/**
 * Root directory for the application
 */
$controllers = __DIR__ . '/controller';
$models = __DIR__ . '/model';
$views = __DIR__ . '/view';
$helpers = __DIR__ . '/helpers';
/**
 * @var string $request_uri The URI which was given in order to access this page.
 * @see https://www.php.net/reserved.variables.server#:~:text=e.%20included)%20file.-,%27REQUEST_URI%27,-The%20URI%20which
 */
$request_uri = $_SERVER['REQUEST_URI'];
/**
 * @var string $request_method Which request method was used to access the page.
 * @see https://www.php.net/reserved.variables.server#:~:text=HTTP/1.0%27%3B-,%27REQUEST_METHOD%27,-Which%20request%20method
 */
$request_method = $_SERVER['REQUEST_METHOD'];
/**
 * Common functions for the application
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
require_once $helpers . '/view.php';
require_once $helpers . '/validation.php';
require_once $helpers . '/notification.php';
/**
 * Send request to controllers according to request.
 *
 * @see https://www.php.net/manual/en/function.strpos.php
 */
if (strpos($request_uri, '/admin') === 0) {
    require $controllers . '/admin/index.php';
} elseif (strpos($request_uri, '/patient') === 0) {
    require $controllers . '/patient/index.php';
} elseif (strpos($request_uri, '/doctor') === 0) {
    require $controllers . '/doctor/index.php';
} else {
    require $controllers . '/website/index.php';
}

