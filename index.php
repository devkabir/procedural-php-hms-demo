<?php
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
 * Send request to controllers according to request.
 * @see https://www.php.net/manual/en/function.strpos.php
 */
if (strpos($request_uri, '/admin') === 0) {
    require __DIR__ . '/controller/admin/index.php';
} elseif (strpos($request_uri, '/patient') === 0) {
    require __DIR__ . '/controller/patient/index.php';
} elseif (strpos($request_uri, '/doctor') === 0) {
    require __DIR__ . '/controller/doctor/index.php';
} else {
    require __DIR__ . '/controller/website/index.php';
}