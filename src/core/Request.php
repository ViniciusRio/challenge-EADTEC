<?php

namespace src\core;

class Request
{
    public static function uri(): string
    {
        $uri = trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );

        if (empty($uri)) {
            return '/';
        }

        return $uri;
    }

    public static function params(): array
    {
        $urlParams = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

        parse_str($urlParams, $params);
        
        return $params;
    }

    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function extractFromPost()
    {
        return json_decode(file_get_contents('php://input'));
    }

}