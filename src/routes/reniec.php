<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->get('/reniec/{dni}', function (Request $request, Response $response, array $args){

        $dni = $args['dni'];
                
        $reniec = new \Reniec\Reniec();
        echo json_encode($reniec->search($dni));

    });