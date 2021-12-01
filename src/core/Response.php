<?php

namespace src\core;

class Response 
{
    public static function sendJson($params) 
    {
        header('Content-Type: application/json');
        http_response_code(200);

        echo json_encode($params);

    }
}