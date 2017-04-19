<?php

namespace custom_components\widgets\select2\src;

use yii\web\AssetBundle;

/**
 * Widget select2 asset bundle.
 */
class Select2Asset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@custom_components/widgets/select2/bower/select2';

    /**
     * @inheritdoc
     */
	public $css = [
		'select2.css'
	];

    /**
     * @inheritdoc
     */
	public $depends = [
		'custom_components\widgets\select2\src\Asset'
	];
}
