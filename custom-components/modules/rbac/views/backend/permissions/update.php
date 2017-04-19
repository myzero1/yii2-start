<?php

/**
 * Permission update view.
 *
 * @var \yii\base\View $this View
 * @var \yii\base\DynamicModel $model Model
 * @var \custom_components\themes\admin\widgets\Box $box Box widget instance
 * @var array $permissionArray Permissions array
 * @var array $ruleArray Rules array
 */

use custom_components\themes\admin\widgets\Box;
use custom_components\modules\rbac\Module;

$this->title = Module::t('rbac', 'BACKEND_PERMISSIONS_UPDATE_TITLE');
$this->params['subtitle'] = Module::t('rbac', 'BACKEND_PERMISSIONS_UPDATE_SUBTITLE');
$this->params['breadcrumbs'] = [
    [
        'label' => $this->title,
        'url' => ['index'],
    ],
    $this->params['subtitle']
]; ?>
<div class="row">
    <div class="col-sm-12">
        <?php $box = Box::begin(
            [
                'title' => $this->params['subtitle'],
                'renderBody' => false,
                'options' => [
                    'class' => 'box-success'
                ],
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'deleteParam' => 'name',
                'buttonsTemplate' => '{create} {cancel} {delete}'
            ]
        );
        echo $this->render(
            '_form',
            [
                'model' => $model,
                'permissionArray' => $permissionArray,
                'ruleArray' => $ruleArray,
                'box' => $box,
                'update' => true
            ]
        );
        Box::end(); ?>
    </div>
</div>
