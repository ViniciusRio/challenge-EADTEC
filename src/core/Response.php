<?php

namespace src\core;

class Response 
{
    public static function sendJson($params) 
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,PATCH,DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        http_response_code(200);

        if ($params === 1) {
            $responseOk = array(
                "status" => 200,
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