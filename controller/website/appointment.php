<?php
/**
 * Including the appointment model.
 */
global $models;
include $models.'/website/appointment.php';
include $models.'/website/patient.php';

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
    include $views.'/website/appointment.php';
    $content = ob_get_clean();
    render($title, $layout, $content);
}


/**
 * It validates the form inputs, creates an appointment if the inputs are valid, and redirects the user
 * to the referer page
 *
 * @param  array  $request  The array of data that was submitted to the form.
 * @param  string  $referer  The page that the form was submitted from.
 */
function process_appointment(array $request, string $referer)
{
    sanitize_inputs($request);
    $errors = null;
    if (validate_unique('patients', 'phone', $request['phone'])){
        $errors['phone'][] = "This phone number is already taken.";
    }
    if (validate_required('name')) {
        $errors['name'][] = "Please enter a valid name";
    }
    $password = $request['password'];
    if ( ! validate_password($password)) {
        $errors['password'][] = 'Please enter a valid password of 6 character.';
    }
    $confirm = $request['confirm-password'];
    if (confirm_password($password, $confirm)) {
        $errors['confirm-password'][] = 'Please retype your password and try again.';
    }
    $appointment_date = $request['appointment-date'];
    if ( ! validate_date($appointment_date)) {
        $errors['appointment-date'][] = 'This is not a time machine!';
    }
    if ( ! empty($errors)) {
        $_SESSION['errors']['form'] = $errors;
        $_SESSION['old_inputs']     = $request;
    } else {
        $patient_id                     = create_patient($request);
        $request['patient_id']          = $patient_id;
        $appointment_id                 = create_appointment($request);
        $_SESSION['success']['message'] = "Your appointment id is $appointment_id ";
    }
    redirect($referer);
}


