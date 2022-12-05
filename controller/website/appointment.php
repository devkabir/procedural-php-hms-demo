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
    $errors = get_errors();
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
function create_appointment(array $request, string $referer)
{
    sanitize_inputs($request);
    $errors = null;
    foreach ($request as $key => $value) {
        if (!validate_required($value)) {
            continue;
        }
        $errors[$key]['required'] = ucfirst(str_replace('-', ' ', $key)) . ' required.';

    }
    if (validate_required('gender')) {
        $errors['gender']['required'] = "Please select a gender";
    }
    $email = $request['email'];
    if (validate_email($email)) {
        $errors['email']['invalid'] = 'Please enter a valid email address.';
    }
    $password = $request['password'];
    if (validate_password($password)) {
        $errors['password']['invalid'] = 'Please enter a valid password of 6 character.';
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old_inputs'] = $request;
        header('Location: ' . $referer, true, 302);
    }
    $name = $request['name'];
    $dob = $request['dob'];
    $gender = $request['gender'];
    $phone = $request['phone'];
    $address = $request['address'];
    $city = $request['city'];
    $state = $request['state'];
    $division = $request['division'];
    $appointment_date = $request['appointment-date'];
    $appointment_reason = $request['appointment-reason'];
}