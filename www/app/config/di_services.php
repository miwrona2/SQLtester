<?php


$di->setShared('BookService', [
    'className' => BookService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'MainRepository',
        ],
    ]
]);

$di->setShared('MainRepository', [
    'className' => MainRepository::class
]);