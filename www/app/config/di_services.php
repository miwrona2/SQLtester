<?php


$di->setShared('BookService', [
    'className' => BookService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'ModelRepository',
        ],
    ]
]);

$di->setShared('ModelRepository', [
    'className' => ModelRepository::class
]);