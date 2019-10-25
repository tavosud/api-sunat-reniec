<?php
/**
 * Created by PhpStorm.
 * User: Tavo
 * Date: 25/11/2018
 * Time: 10:39
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/tipocambio/{dia}/{mes}/{anho}', function (Request $request, Response $response, array $args){

    $dia = $args['dia'];
    $mes = $args['mes'];
    $anho = $args['anho'];

    $url = 'http://www.sunat.gob.pe/cl-at-ittipcam/tcS01Alias?mes='. $mes .'&anho='.$anho;

    $codigo_fuente = file_get_contents($url);

    $modifi = '<strong>'.$dia;

    $parte_codigo = strstr($codigo_fuente,$modifi);

    $compra = trim(substr($parte_codigo,105, 14));

    $venta = trim(substr($parte_codigo,198, 13));

    if( empty($compra) and empty($venta)){
        print '{ "compra" : 0, "venta" : 0 }';
    }else{
        print '{ "compra" : '.$compra. ', "venta" : '.$venta .' }';
    }

});
