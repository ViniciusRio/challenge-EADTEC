<?php
    $router->get('instructors', 'InstructorController@findAll');
    $router->get('instructor', 'InstructorController@findById');
    $router->post('instructor', 'InstructorController@insert');
    $router->put('instructor', 'InstructorController@put');
    $router->patch('instructor', 'InstructorController@patch');
    $router->delete('instructor', 'InstructorController@delete');




