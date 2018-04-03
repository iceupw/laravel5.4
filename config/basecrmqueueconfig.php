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
                'host'      => '192.168.179.129',
                'port'      => '5672',
                'user'      => 'admin',
                'pass'      => 'admin',
                'vhost'     => '/admin',
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
