<?php


/**
 * If there are errors, return them.
 *
 * @return array The array of errors.
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function get_errors(): array
{
    return has_error() ? $_SESSION['errors'] : [];
}

/**
 * If the session exists and the key 'errors' exists in the session, return true. Otherwise, return
 * false
 *
 * @return bool a boolean value.
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function has_error(): bool
{
    return isset($_SESSION) && array_key_exists('errors', $_SESSION);
}

/**
 * It kills the script and displays a message
 *
 * @param string $message The message to be displayed.
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function whistleblower(string $message): void
{
    die("<h1 style='text-transform: none; text-align: center;'>" . $message . "</h1>");
}

/**
 * If there is a success message, return it, otherwise return an empty string
 *
 * @return string The success message.
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function get_success_message(): string
{
    return has_success() ? $_SESSION['success']['message'] : '';
}

/**
 * If the session exists and the success key exists in the session, return true, otherwise return false
 *
 * @return bool A boolean value.
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function has_success(): bool
{
    return isset($_SESSION) && array_key_exists('success', $_SESSION);
}

/**
 * It displays a success message
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function show_success_message()
{
    echo '<div class="success">' . get_success_message() . '</div>';
    $_SESSION['success'] = null;
}

/**
 * If there are errors, return the form error messages, otherwise return an empty array
 *
 * @return array An array of form errors.
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function get_form_error_message(): array
{
    return has_error() ? get_errors()['form'] : [];
}

/**
 * It returns a span element with the error message if the form has an error for the given field name, otherwise it
 * returns an empty string
 *
 * @param string name The name of the form field.
 *
 * @return string a string.
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function show_form_error_message(string $name): string
{
    $formErrorMessage = get_form_error_message();
    return array_key_exists($name, $formErrorMessage) ? '<span class="form-error">' . $formErrorMessage[$name][0] . '</span>' : '';
}