<?php

namespace custom_components\themes\admin;

use yii\web\AssetBundle;

/**
 * Theme data tables asset bundle.
 */
class DataTablesAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@custom_components/themes/admin/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/datatables/dataTables.bootstrap.css'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'custom_components\themes\admin\ThemeAsset'
    ];
}
