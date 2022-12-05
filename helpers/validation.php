<?php

/**
 * Sanitize user inputs
 *
 * @param array $requests Submitted form data.
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function sanitize_inputs(array &$requests)
{
    $requests = array_map(static function ($input) {
        return trim(stripslashes(htmlspecialchars($input)));
    }, $requests);
}


/**
 * Validate required fields
 *
 * @param string $field The field to validate
 *
 * @return bool
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function validate_required(string $field): bool
{
    return $field === '';
}


/**
 * Validate user's email address
 *
 * @param string $email user's email address.
 *
 *
 * @return bool
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function validate_email(string $email): bool
{
    $sanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
    return !filter_var($sanitized, FILTER_VALIDATE_EMAIL);
}

/**
 * Validate user inputted password has 6 character or not.
 *
 * @param string $password User inputted password.
 *
 * @return bool
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function validate_password(string $password): bool
{
    return strlen($password) < 6;
}

/**
 * Get input value from session after validation.
 *
 * @param string $key The name of the field.
 *
 * @return mixed|null
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function old(string $key)
{
    if (isset($_SESSION) && array_key_exists('old_inputs', $_SESSION)) {
        return $_SESSION['old_inputs'][$key] ?? null;
    }
    return null;
}