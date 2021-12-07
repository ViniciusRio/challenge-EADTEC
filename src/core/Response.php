<?php

namespace src\core;

class Response 
{
    public static function sendJson($params) 
    {
        header('Content-Type: application/json');
        http_response_code(201);

        if ($params === 1) {
            $responseOk = array(
                "status" => 201,
                "response" => 'Action executed'
            );

            echo json_encode($responseOk);

            return;
            
        } 
        if ($params === 0) {
            $responseOk = array(
                "status" => 404,
                "response" => 'Instructor not found'
            );

            echo json_encode($responseOk);

            return;
            
        }

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