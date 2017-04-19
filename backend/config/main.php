<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$aConfigs = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'custom_components\modules\admin\Module',
            'bootstrap' => [
                'custom_components\modules\admin\Bootstrap',
                'custom_components\themes\Bootstrap'
            ],
            'menu' => [
                'dashboard' => [
                    'label' => 'Yii::t("custom_components/themes/admin", "Dashboard")',
                    'url' => 'Yii::$app->homeUrl',
                    'icon' => 'fa-dashboard',
                    'active' => 'Yii::$app->request->url === Yii::$app->homeUrl'
                ],
            ],
            'components' => [
                'urlManager' => [
                    'class' => 'yii\web\UrlManager',
                    'enablePrettyUrl' => true,
                    'enableStrictParsing' => true,
                    'showScriptName' => false,
                    'suffix' => '/',
                    'rules' => [
                        '' => 'admin/default/index',
                        '<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>'
                    ],
                ],
                'view' => [
                    'class' => 'yii\web\View',
                    'theme' => 'custom_components\themes\admin\Theme'
                ],
                'errorHandler' => [
                    'class' => 'yii\web\ErrorHandler',
                    'errorAction' => 'admin/default/error'
                ],
            ],
        ],
        'users' => [
            'controllerNamespace' => 'custom_components\modules\users\controllers\backend',
            'class' => 'custom_components\modules\users\Module',
            'bootstrap' => ['custom_components\modules\users\Bootstrap'],
            'robotEmail' => 'no-reply@domain.com',
            'robotName' => 'Robot',
            'menu' => [
                'users' => [
                    'label' => 'Yii::t("custom_components/themes/admin", "Users")',
                    'url' => ['/users/default/index'],
                    'icon' => 'fa-group',
                    'visible' => 'Yii::$app->user->can("administrateUsers") || Yii::$app->user->can("BViewUsers")',
                ],
            ],

            'components' => [
                'user' => [
                    'class' => 'yii\web\User',
                    'identityClass' => 'custom_components\modules\users\models\User',
                    'loginUrl' => ['/users/guest/login']
                ],
            ],
        ],
        'rbac' => [
            'class' => 'custom_components\modules\rbac\Module',
            'controllerNamespace' => 'custom_components\modules\rbac\controllers\backend',
            'bootstrap' => ['custom_components\modules\rbac\Bootstrap'],
            'menu' => [
                'rbac' => [
                    'label' => 'Yii::t("custom_components/themes/admin", "Access control")',
                    'url' => '#',
                    'icon' => 'fa-gavel',
                    'visible' => 'Yii::$app->user->can("administrateRbac") || Yii::$app->user->can("BViewRoles") || Yii::$app->user->can("BViewPermissions") || Yii::$app->user->can("BViewRules")',
                    'items' => [
                        [
                            'label' => 'Yii::t("custom_components/themes/admin", "Permissions")',
                            'url' => ['/rbac/permissions/index'],
                            'visible' => 'Yii::$app->user->can("administrateRbac") || Yii::$app->user->can("BViewPermissions")'
                        ],
                        [
                            'label' => 'Yii::t("custom_components/themes/admin", "Roles")',
                            'url' => ['/rbac/roles/index'],
                            'visible' => 'Yii::$app->user->can("administrateRbac") || Yii::$app->user->can("BViewRoles")'
                        ],
                        [
                            'label' => 'Yii::t("custom_components/themes/admin", "Rules")',
                            'url' => ['/rbac/rules/index'],
                            'visible' => 'Yii::$app->user->can("administrateRbac") || Yii::$app->user->can("BViewRules")'
                        ]
                    ]
                ],
            ],
            'components' => [
                'authManager' => [
                    'class' => 'yii\rbac\PhpManager',
                    'defaultRoles' => [
                        'user'
                    ],
                    'itemFile' => '@custom_components/modules/rbac/data/items.php',
                    'assignmentFile' => '@custom_components/modules/rbac/data/assignments.php',
                    'ruleFile' => '@custom_components/modules/rbac/data/rules.php',
                ],
            ],
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => 'asdfasdkj;isaduewr#*Kkklh71923875huiaen$',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];

// Processing parameters from modules
$aConfigs['params']['menu'] = isset($aConfigs['params']['menu']) ? $aConfigs['params']['menu'] : array();
$aConfigs['bootstrap'] = isset($aConfigs['bootstrap']) ? $aConfigs['bootstrap'] : array();
$aConfigs['components'] = isset($aConfigs['components']) ? $aConfigs['components'] : array();

foreach ($aConfigs['modules'] as $key => $value) {
    if (array_key_exists('bootstrap', $value)) {
        $aConfigs['bootstrap'] = yii\helpers\ArrayHelper::merge($aConfigs['bootstrap'],$value['bootstrap']);
    }

    if (array_key_exists('components', $value)) {
        $aConfigs['components'] = yii\helpers\ArrayHelper::merge($aConfigs['components'],$value['components']);
    }

    if (array_key_exists('menu', $value)) {
        $aConfigs['params']['menu'] = yii\helpers\ArrayHelper::merge($aConfigs['params']['menu'],$value['menu']);
    }
}

return $aConfigs;