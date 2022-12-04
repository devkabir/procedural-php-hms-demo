<?php


/**
 * Show homepage of the website
 *
 * @param string $views
 * @param string $layout
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function show_homepage(string $views, string $layout): void
{
    $title = 'Home';
    ob_start();
    include $views . '/website/index.php';
    $content = ob_get_clean();
    render($title, $layout, $content);
}