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
}