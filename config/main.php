<?php

 return [

    'template_root' => $_SERVER['DOCUMENT_ROOT'] . "/../views/",
    'layout' => 'main',

    'components' => [

        'user' => [

            'class' => "app\\models\\Customer"

        ],

        'product' => [

            'class' => "app\\models\\Product"

        ],

        'user_rep' => [

            'class' => "app\\models\\CustomerRep"

        ],


        'auth' => [

            'class' => "app\\services\\Auth"

        ],

        'mainController' => [

            'class' => "app\\controllers\\FrontController"

        ],

        'request' => [

            'class' => "app\\services\\RequestManager"

        ],

        'db' => [

            'class' => "app\\services\\Db",
            'driver' => 'mysql',
            'host' => 'localhost',
            'user' => 'root',
            'password' => '',
            'database' => 'shop1'

        ],

        'db_remote' => [

            'class' => "app\\services\\Db",
            'driver' => 'mysql',
            'host' => '1.1.1.1.',
            'user' => 'root',
            'password' => '',
            'database' => 'shop1'

        ],

        'session_rep' => [

            'class' => "app\\models\\SessionsRep"

        ],

        'renderer' => [

            'class' => "app\\services\\TemplateRenderer"

        ],
    ]
 ];