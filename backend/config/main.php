<?php

Yii::setAlias('backend', dirname(__DIR__));

$config = [
    'id' => 'app-backend',
    'name' => 'Yii2-Start',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'admin/default/index',
    'bootstrap' => [
        'log',
        // 'mytest1' => [
        //     'class' => 'custom_components\modules\mytest\Bootstrap',
        // ],
    ],
  //   'extensions' =>array(
  //     'custom_components/modules/users' => 
  // array (
  //   'name' => 'custom_components/modules/users',
  //   'version' => '0.2.7.0',
  //   'alias' => 
  //   array (
  //     '@custom_components/modules/users' => Yii::getAlias('@custom_components/modules/users'),
  //   ),
  //   'bootstrap' => 'custom_components\\modules\\users\\Bootstrap',
  // ),),
    'modules' => [
        'admin' => [
            'class' => 'vova07\admin\Module'
        ],
        'users' => [
            'controllerNamespace' => 'vova07\users\controllers\backend'
        ],
        // 'admin' => [
        //     'class' => 'custom_components\modules\admin\Module'
        // ],
        // 'users' => [
        //     'controllerNamespace' => 'custom_components\modules\users\controllers\backend'
        // ],
        'mytest' => [
            'class' => 'custom_components\modules\mytest\Module',
        ],
        // 'blogs' => [
        //     'isBackend' => true
        // ],
        // 'comments' => [
        //     'isBackend' => true
        // ],
        // 'rbac' => [
        //     'class' => 'vova07\rbac\Module',
        //     'isBackend' => true
        // ]
    ],
    'components' => [
        'mytest' => [
            'class' => 'custom_components\modules\mytest\Bootstrap',
        ],
        'request' => [
            'cookieValidationKey' => '7fdsf%dbYd&djsb#sn0mlsfo(kj^kf98dfh',
            // 'baseUrl' => '/backend'
        ],
        'urlManager' => [
            'rules' => [
                '' => 'admin/default/index',
                '<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>'
            ]
        ],
        'view' => [
            'theme' => 'vova07\themes\admin\Theme'
        ],
        // 'view' => [
        //     'theme' => 'custom_components\themes\admin\Theme'
        // ],
        'errorHandler' => [
            'errorAction' => 'admin/default/error'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning']
                ]
            ]
        ]
    ],
    'params' => require(__DIR__ . '/params.php')
];



return $config;