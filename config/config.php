<?php

return [
    'database' => [
        'type' => 'mysql',
        'host' => '119.3.225.47',
        'dbname' => 'blog',
        'username' => 'root',
        'password' => 'zxc_root',
        'port' => 3306,
        'fix' => 'blog_',
        'charset' => 'utf8',
    ],
    'default' => [
        'controller' => 'Admin',
        'action' => 'base'
    ],
    'cookie_time' => time() + 86400 * 7
];
