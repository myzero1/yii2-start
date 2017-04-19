<?php

namespace custom_components\themes\site;

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
        '@frontend/views' => '@custom_components/themes/site/views',
        '@frontend/modules' => '@custom_components/themes/site/modules'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'sourcePath' => '@custom_components/themes/site/assets',
            'css' => [
                'css/bootstrap.min.css'
            ]
        ];
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset'] = [
            'sourcePath' => '@custom_components/themes/site/assets',
            'js' => [
                'js/bootstrap.min.js'
            ]
        ];
    }
}
