<?php
/**
 * Render a page
 *
 * @param string $title   Page title
 * @param string $layout  Base layout
 * @param string $content Content of the page
 *
 * @author Dev Kabir <dev.kabir01@gmail.com>
 */
function render(string $title, string $layout, string $content)
{
    $layout = str_replace('{{title}}', $title, $layout);
    $view = str_replace('{{content}}', $content, $layout);
    echo $view;
}



