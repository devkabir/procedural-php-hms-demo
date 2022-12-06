<?php
/**
 * Including the appointment model.
 */
global $models;
include $models . '/website/appointment.php';

/**
 * It renders the appointment form.
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function show_appointment_form(): void
{
    global $views, $layout;
    $title = 'Appointment';
    ob_start();
    include $views . '/website/appointment.php';
    $content = ob_get_clean();
    render($title, $layout, $content);
}


/**
 * It validates the form inputs, creates an appointment if the inputs are valid, and redirects the user
 * to the referer page
 *
 * @param array  $request The array of data that was submitted to the form.
 * @param string $referer The page that the form was submitted from.
 */
function process_appointment(array $request, string $referer)
{
    sanitize_inputs($request);
    $errors = null;
    foreach ($request as $key => $value) {
        if (!validate_required($value)) {
            continue;
        }
        $errors[$key][] = ucfirst(str_replace('-', ' ', $key)) . ' required.';

    }
    if (validate_required('gender')) {
        $errors['gender'][] = "Please select a gender";
    }
    $email = $request['email'];
    if (validate_email($email)) {
        $errors['email'][] = 'Please enter a valid email address.';
    }
    $password = $request['password'];
    if (!validate_password($password)) {
        $errors['password'][] = 'Please enter a valid password of 6 character.';
    }
    $confirm = $request['confirm-password'];
    if (confirm_password($password, $confirm)) {
        $errors['confirm-password'][] = 'Please retype your password and try again.';
    }
    $appointment_date = $request['appointment-date'];
    if (!validate_date($appointment_date)) {
        $errors['appointment-date'][] = 'This is not a time machine!';
    }
    if (!empty($errors)) {
        $_SESSION['errors']['form'] = $errors;
        $_SESSION['old_inputs'] = $request;
    } else {
        $appointment_id = create_appointment($request);
        $_SESSION['success']['message'] = "Your appointment id is $appointment_id ";
    }
    redirect($referer);
}