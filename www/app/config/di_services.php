<?php


$di->setShared('BookService', [
    'className' => BookService::class,
    'arguments' => [
        [
            'type' => 'service',
            'name' => 'MainRepository',
        ],
        [
            'type' => 'service',
            'name' => 'RawSqlRepository',
        ],
    ]
]);

$di->setShared('MainRepository', [
    'className' => MainRepository::class
]);

$di->setShared('RawSqlRepository', [
    'className' => RawSqlRepository::class
]);