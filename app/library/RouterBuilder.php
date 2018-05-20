<?php

use Phalcon\Mvc\Router\Annotations;

class RouterBuilder
{
    public function build()
    {
        $router = new Annotations();
        $router->addResource('Index');
        $router->setUriSource(\Phalcon\Mvc\Router::URI_SOURCE_GET_URL);
        return $router;
    }
}