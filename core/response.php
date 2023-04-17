<?php
/**
 * It redirects the user to the given path
 *
 * @param  string  $path  The path to redirect to.
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function redirect(string $path): void
{
    header('Location: '.$path, true, 302);
}
