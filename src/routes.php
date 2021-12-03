<?php
    $router->get('instructors', 'InstructorController@findAll');
    $router->get('instructor', 'InstructorController@findById');
    $router->post('instructor', 'InstructorController@insert');

