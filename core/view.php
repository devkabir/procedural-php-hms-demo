<?php
/**
 * It takes a layout, replaces the title placeholder with the title, replaces the content placeholder
 * with the content, and then echoes the result.
 *
 * @param string $title The title of the page
 * @param string $layout The layout file to use.
 * @param string $content The content of the page.
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function render( string $title, string $layout, string $content ) {
	$placeholders = array(
		'{{title}}'   => $title,
		'{{content}}' => $content,
	);

	$view = strtr( $layout, $placeholders );
	echo $view;

}

/**
 * Escapes a string for safe rendering in PHP.
 *
 * @param string $value The string to escape.
 *
 * @return string The escaped string.
 */
function escape( string $value ): string {
	return htmlspecialchars( $value, ENT_QUOTES | ENT_HTML5 );
}

/**
 * It shows how much time takes to render a page.
 *
 * @return string a string that displays the elapsed time in seconds.
 */
function execution_time(): string {
	$endTime     = microtime( true );
	$elapsedTime = $endTime - START;
	return sprintf( '<p style="position: fixed;bottom: 0;right: 0;font-weight: bold">Execution time: %.3f seconds</p>', $elapsedTime );
}


