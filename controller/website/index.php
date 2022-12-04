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
switch ($website_uri) {
    case '/':
        require_once __DIR__ . '/home.php';
        show_homepage($views, $layout);
        break;
    case '/appointment':
        require_once __DIR__ . '/appointment.php';
        if ($request_method === 'GET') {
            show_appointment_form($views, $layout);
        } else {
            create_appointment($_REQUEST);
        }
        break;
    default:
        http_response_code(404);
        break;
}