<?php

namespace Codad5\PhpRouter\HTTP;

class HTML
{
    public static function send($html)
    {
        header("X-Powered-By: "); // Disable X-Powered-By header for security reasons
        header('Content-Type: text/html');
        echo $html;
    }
}