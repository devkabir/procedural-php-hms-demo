<?php
/**
 * It takes a layout, replaces the title placeholder with the title, replaces the content placeholder
 * with the content, and then echoes the result.
 *
 * @param  string  $title  The title of the page
 * @param  string  $layout  The layout file to use.
 * @param  string  $content  The content of the page.
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function render(string $title, string $layout, string $content)
{
    $layout = str_replace('{{title}}', $title, $layout);
    $view   = str_replace('{{content}}', $content, $layout);
    echo $view;
}
