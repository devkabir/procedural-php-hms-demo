<?php
/**
 * It takes an array of inputs, trims whitespace, strips slashes, and converts special characters to
 * HTML entities
 *
 * @param array $requests The array of requests to sanitize.
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function sanitize_inputs(array &$requests): void
{
    $requests = array_map(static function ($input) {
        return trim(stripslashes(htmlspecialchars($input)));
    }, $requests);
}


/**
 * If the field is empty, return true, otherwise return false.
 *
 * @param string $field The field to validate
 *
 * @return bool A boolean value.
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function validate_required(string $field): bool
{
    return $field === '';
}


/**
 * If the email is valid, then the sanitized version of the email will be the same as the original
 * email. If the email is invalid, then the sanitized version of the email will be different than the
 * original email.
 *
 * @param string $email The email address to validate.
 *
 * @return bool True or False
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function validate_email(string $email): bool
{
    $sanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
    return !filter_var($sanitized, FILTER_VALIDATE_EMAIL);
}


/**
 * If the length of the password is less than 6, return true, otherwise return false.
 *
 * @param string $password The password to validate.
 *
 * @return bool True or False
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function validate_password(string $password): bool
{
    return ($password === '') < 6;
}

/**
 * If the password and confirmation password are not the same, return true.
 *
 * @param string $password The password to validate.
 * @param string $confirm  The password confirmation.
 *
 * @return bool A boolean value.
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function confirm_password(string $password, string $confirm): bool
{
    return $password !== $confirm;
}

/**
 * If the session has an old_inputs key, return the value of the key in the old_inputs array, otherwise
 * return ''
 *
 * @param string $key The key of the old input value you want to retrieve.
 *
 * @return string value of the key in the session array.
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function old(string $key): ?string
{
    if (isset($_SESSION) && array_key_exists('old_inputs', $_SESSION)) {
        return $_SESSION['old_inputs'][$key] ?? null;
    }
    return '';
}

/**
 * If today is less than the date passed in, return true, otherwise return false.
 *
 * @param string $date The date to validate.
 *
 * @return bool True or False
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function validate_date(string $date): bool
{
    return today() < $date;
}