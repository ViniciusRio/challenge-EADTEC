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

    public function index()
    {
        $result = $this->instructorGateway->findAll();

        return Response::sendJson($result);

    }
}