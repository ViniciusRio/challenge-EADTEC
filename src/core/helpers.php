<?php


function getGatewayNameByController($controller) {
    return explode('-', preg_replace('/(?<!^)([A-Z])/', '-\\1', $controller));
}

function getPathGateway($gateway) {
    return "\\src\\database\\gateways\\{$gateway[0]}".'Gateway';
}

function getPathController($controller) {
    return "\\src\\controllers\\{$controller}";
}