<?php
/**
 * Created by PhpStorm.
 * User: YDZ
 * Date: 2018/4/3
 * Time: 16:43
 */
return [
    'rabbitmq' => [
        'server' => [
            [
                'host'      => env('RABBITMQ_HOST', '127.0.0.1'),
                'port'      => env('RABBITMQ_PORT', '5567'),
                'user'      => env('RABBITMQ_USER', 'admin'),
                'pass'      => env('RABBITMQ_PASS', 'admin'),
                'vhost'     => '/',
            ],
        ],
        'info'  => [
            'test'  =>
                [
                    'queueKey'  => 'doumi.crm.task.qa',
                    'exchange'  => 'doumi.crm.task.qa'
                ],
        ],
    ],
];
