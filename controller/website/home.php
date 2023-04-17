<?php

/**
 * Show homepage of the website
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function show_homepage(): void
{
    global $views, $layout;
    $title = 'Home';
    ob_start();
    include $views.'/website/index.php';
    $content = ob_get_clean();
    render($title, $layout, $content);
}
