<?php

/**
 * Show appointment form
 *
 * @param string $views
 * @param string $layout
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function show_appointment_form(string $views, string $layout): void
{
    $title = 'Appointment';
    ob_start();
    include $views . '/website/appointment.php';
    $content = ob_get_clean();
    render($title, $layout, $content);
}

/**
 * Create a new appointment for patient
 *
 * @param array $request Submitted request
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function create_appointment(array $request)
{
    var_dump($request);
}