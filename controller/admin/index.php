<?php
/**
 * Extract routes for admin
 * @see https://php.net/manual/en/function.sscanf.php
 */
sscanf($request_uri, "/admin/%s", $admin_uri);
var_dump($admin_uri);