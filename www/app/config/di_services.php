<?php


$di->setShared('BookService', [
    'className' => BookService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'BookRepository',
        ],
    ]
]);

$di->setShared('BookRepository', [
    'className' => BookRepository::class
]);