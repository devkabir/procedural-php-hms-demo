<?php
/** Making the variables `$request_uri`, `$request_method`, and `$views` available to the
 * current file.
 */
global $request_uri, $request_method, $views;
/**
 * Getting the first part of the URL. For example, if the URL is `http://example.com/appointment`, it
 * will get `/appointment`.
 */
sscanf($request_uri, "%s", $website_uri);

/**
 *  Getting the contents of the layout file.
 */
$layout = file_get_contents($views.'/website/layout.html');

/**
 * The router for the website. It is responsible for loading the correct page based on the URL.
 */
session_start();
switch ($website_uri) {
    case '/':
        require_once __DIR__.'/home.php';
        show_homepage();
        session_destroy();
        break;
    case '/appointment':
        require_once __DIR__.'/appointment.php';
        if ($request_method === 'GET') {
            show_appointment_form();
            session_destroy();
        } else {
            /**
             * Getting the URL of the page that the user was on before they clicked the link to the
             * appointment page.
             */
            $http_referer = $_SERVER['HTTP_REFERER'];
            process_appointment($_REQUEST, $http_referer);
        }
        break;
    default:
        http_response_code(404);
        break;
}
