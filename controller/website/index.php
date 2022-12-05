<?php
/**
 * Extract routes for website
 *
 * @see    https://php.net/manual/en/function.sscanf.php
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
sscanf($request_uri, "%s", $website_uri);
/**
 * Get layout for the website
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
$layout = file_get_contents($views . '/website/layout.html');
/**
 * Router for the website
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
session_start();
switch ($website_uri) {
    case '/':
        require_once __DIR__ . '/home.php';
        show_homepage($views, $layout);
        session_destroy();
        break;
    case '/appointment':
        require_once __DIR__ . '/appointment.php';
        if ($request_method === 'GET') {
            show_appointment_form($views, $layout);
            session_destroy();
        } else {
            /**
             * @var string $http_referer
             */
            $http_referer = $_SERVER['HTTP_REFERER'];
            create_appointment($_REQUEST, $http_referer);
        }
        break;
    default:
        http_response_code(404);
        break;
}