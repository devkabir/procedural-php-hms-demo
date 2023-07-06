<?php

/**
 * It generates a username by removing whitespace, converting the name to lowercase, replacing non-alphanumeric
 * characters with underscores, and appending a random number.
 *
 * @param string $name of user in full format
 *
 * @return string of formatted username.
 */
function generate_username( string $name ): string {
	// Remove any whitespace and convert the full name to lowercase
	$username = strtolower( str_replace( ' ', '', $name ) );
	// Replace any non-alphanumeric characters with an underscore
	$username = preg_replace( '/[^a-z0-9]/', '_', $username );
	// Generate a random number between 1000 and 9999
	$randomNumber = rand( 1000, 9999 );
	// Combine the name and random number to create the username
	return $username . $randomNumber;
}
