<?php

namespace custom_components\themes\admin;

use Yii;

/**
 * Class Theme
 * @package custom_components\themes\admin
 */
class Theme extends \yii\base\Theme
{
    /**
     * @inheritdoc
     */
    public $pathMap = [
        '@backend/views' => '@custom_components/themes/admin/views',
        '@backend/modules' => '@custom_components/themes/admin/modules'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        //add Bootstrap by woogle
        $oBootstrap = new \custom_components\themes\Bootstrap();
        $oBootstrap->bootstrap(Yii::$app);

        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'sourcePath' => '@custom_components/themes/admin/assets',
            'css' => [
                'css/bootstrap.min.css'
            ]
        ];
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset'] = [
            'sourcePath' => '@custom_components/themes/admin/assets',
            'js' => [
                'js/bootstrap.min.js'
            ]
        ];
        Yii::$container->set('yii\grid\CheckboxColumn', [
            'checkboxOptions' => [
                'class' => 'simple'
            ]
        ]);
    }
}
