<?php
/**
 * Created by PhpStorm.
 * User: Tavo
 * Date: 25/11/2018
 * Time: 9:10
 */

require '../vendor/autoload.php';
require '../src/autoload.php'; //servicio sunat

$app = new \Slim\App;

//rutas
require "../src/routes/sunat.php";
require "../src/routes/tipocambio.php";
require "../src/routes/reniec.php";

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->run();