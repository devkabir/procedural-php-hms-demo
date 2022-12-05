<?php

/**
 * Get validation or any kind of error message from session.
 *
 * @return false|mixed
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function get_errors()
{
    if (has_error()) {
        return $_SESSION['errors'];
    }
    return false;
}

/**
 * Is there any error information available in the session.
 *
 * @return bool
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function has_error(): bool
{
    return isset($_SESSION) && array_key_exists('errors', $_SESSION);
}
