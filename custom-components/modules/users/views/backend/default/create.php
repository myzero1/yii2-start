<?php

/**
 * User create view.
 *
 * @var \yii\web\View $this View
 * @var \custom_components\modules\users\models\backend\User $user User
 * @var \custom_components\modules\users\models\Profile $profile Profile
 * @var array $roleArray Roles array
 * @var array $statusArray Statuses array
 * @var \custom_components\themes\admin\widgets\Box $box Box widget instance
 */

use custom_components\themes\admin\widgets\Box;
use custom_components\modules\users\Module;

$this->title = Module::t('users', 'BACKEND_CREATE_TITLE');
$this->params['subtitle'] = Module::t('users', 'BACKEND_CREATE_SUBTITLE');
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
                    'class' => 'box-primary'
                ],
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'buttonsTemplate' => '{cancel}'
            ]
        );
        echo $this->render(
            '_form',
            [
                'user' => $user,
                'profile' => $profile,
                'roleArray' => $roleArray,
                'statusArray' => $statusArray,
                'box' => $box
            ]
        );
        Box::end(); ?>
    </div>
</div>