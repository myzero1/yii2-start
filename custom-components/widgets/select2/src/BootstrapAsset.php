<?php

namespace custom_components\widgets\select2\src;

use yii\web\AssetBundle;

/**
 * Widget bootstrap asset bundle.
 */
class BootstrapAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@custom_components/widgets/select2/bower/select2';
    /**
     * @inheritdoc
     */
    public $css = [
        'select2-bootstrap.css'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'custom_components\widgets\select2\src\Asset',
        'yii\bootstrap\BootstrapAsset'
    ];
}
