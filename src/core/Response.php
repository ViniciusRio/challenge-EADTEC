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

    public static function routeNotFound($route) 
    {
        header('Content-Type: application/json');
        http_response_code(404);

        $reponse = array(
            'status_code' => 404,
            'response' => "Route $route not found"

        );

        echo json_encode($reponse);

    }
    
}