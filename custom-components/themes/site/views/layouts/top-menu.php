<?php

/**
 * Top menu view.
 *
 * @var \yii\web\View $this View
 */

use custom_components\themes\site\widgets\Menu;

echo Menu::widget(
    [
        'options' => [
            'class' => isset($footer) ? 'pull-right' : 'nav navbar-nav navbar-right'
        ],
        'items' => [
            [
                'label' => Yii::t('custom_components/themes/site', 'Blogs'),
                'url' => ['/blogs/default/index']
            ],
            [
                'label' => Yii::t('custom_components/themes/site', 'Contacts'),
                'url' => ['/site/default/contacts']
            ],
            [
                'label' => Yii::t('custom_components/themes/site', 'Sign In'),
                'url' => ['/users/guest/login'],
                'visible' => Yii::$app->user->isGuest
            ],
            [
                'label' => Yii::t('custom_components/themes/site', 'Sign Up'),
                'url' => ['/users/guest/signup'],
                'visible' => Yii::$app->user->isGuest
            ],
            [
                'label' => Yii::t('custom_components/themes/site', 'Settings'),
                'url' => '#',
                'template' => '<a href="{url}" class="dropdown-toggle" data-toggle="dropdown">{label} <i class="icon-angle-down"></i></a>',
                'visible' => !Yii::$app->user->isGuest,
                'items' => [
                    [
                        'label' => Yii::t('custom_components/themes/site', 'Edit profile'),
                        'url' => ['/users/user/update']
                    ],
                    [
                        'label' => Yii::t('custom_components/themes/site', 'Change email'),
                        'url' => ['/users/user/email']
                    ],
                    [
                        'label' => Yii::t('custom_components/themes/site', 'Change password'),
                        'url' => ['/users/user/password']
                    ]
                ]
            ],
            [
                'label' => Yii::t('custom_components/themes/site', 'Sign Out'),
                'url' => ['/users/user/logout'],
                'visible' => !Yii::$app->user->isGuest
            ]
        ]
    ]
);