<?php

namespace custom_components\modules\rbac;

use yii\base\BootstrapInterface;

/**
 * Blogs module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module I18N category.
        if (!isset($app->i18n->translations['custom_components/modules/rbac']) && !isset($app->i18n->translations['custom_components/modules/*'])) {
            $app->i18n->translations['custom_components/modules/rbac'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@custom_components/modules/rbac/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'custom_components/modules/rbac' => 'rbac.php',
                ]
            ];
        }
    }
}
