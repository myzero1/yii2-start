<?php

namespace custom_components\widgets\fileapi;

use yii\web\AssetBundle;

/**
 * Crop asset bundle.
 */
class CropAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@custom_components/widgets/fileapi/rubaxa/fileapi';

    /**
     * @inheritdoc
     */
	public $css = [
	    'jcrop/jquery.Jcrop.min.css'
	];

    /**
     * @inheritdoc
     */
	public $js = [
	    'jcrop/jquery.Jcrop.min.js'
	];

    /**
     * @inheritdoc
     */
	public $depends = [
		'custom_components\widgets\fileapi\Asset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
	];
}
