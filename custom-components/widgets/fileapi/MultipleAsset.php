<?php

namespace custom_components\widgets\fileapi;

use yii\web\AssetBundle;

/**
 * Multiple upload asset bundle.
 */
class MultipleAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
	public $sourcePath = '@custom_components/widgets/fileapi/assets';

    /**
     * @inheritdoc
     */
	public $css = [
	    'css/multiple.css'
	];

    /**
     * @inheritdoc
     */
	public $depends = [
		'custom_components\widgets\fileapi\Asset'
	];
}
