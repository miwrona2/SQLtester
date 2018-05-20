<?php

use Phalcon\Mvc\RouterInterface;

class Url extends \Phalcon\Mvc\Url
{
    public function setRouter(RouterInterface $router)
    {
        try {
            $router->handle('/');
        } catch (\Exception $e) {

        }
        $this->_router = $router;
    }

    public function getRouter()
    {
        if ($this->_router) {
            return $this->_router;
        }

        return $this->getDI()->get('router');
    }

    public function get($uri = null, $args = null, $local = null, $baseUri = null)
    {

        $url = parent::get($uri, $args, $local, $baseUri);

        return $url;
    }
}