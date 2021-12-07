<?php

namespace src\controllers;

use src\core\Response;
use src\database\gateways\InstructorGateway;

class InstructorController
{
    private InstructorGateway $instructorGateway;

    public function __construct()
    {
        $this->instructorGateway = new InstructorGateway();
    }

    public function findAll()
    {
        $result = $this->instructorGateway->findAll();

        return Response::sendJson($result);

    }

    public function findById(array $params)
    {
        $id = $params['id'];

        $result = $this->instructorGateway->findById((int)$id);

        

        return Response::sendJson($result);

    }

    public function insert(object $instructor)
    {
        $result = $this->instructorGateway->insert($instructor);

        return Response::sendJson($result);

    }

    public function put(object $instructor)
    {
        $result = $this->instructorGateway->put($instructor);

        return Response::sendJson($result);

    }

    public function patch(object $instructor)
    {

        $result = $this->instructorGateway->patch($instructor);

        return Response::sendJson($result);

    }

    
    public function delete(array $params)
    {
        $id = (int) $params['id'];
        $result = $this->instructorGateway->delete($id);

        return Response::sendJson($result);

    }
}