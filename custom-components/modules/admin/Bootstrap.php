<?php

namespace custom_components\modules\admin;

use yii\base\BootstrapInterface;

/**
 * Gallery module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module URL rules.
        $app->getUrlManager()->addRules(
            [
                '' => 'admin/default/index',
                '<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>'
            ]
        );

        // Add module I18N category.
        if (!isset($app->i18n->translations['custom_components/modules/admin']) && !isset($app->i18n->translations['custom_components/modules/*'])) {
            $app->i18n->translations['custom_components/modules/admin'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@custom_components/modules/admin/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'custom_components/modules/admin' => 'admin.php',
                ]
            ];
        }
    }
}
