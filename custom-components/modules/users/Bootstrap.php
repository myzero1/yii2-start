<?php

namespace custom_components\modules\users;

use yii\base\BootstrapInterface;

/**
 * Users module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // var_dump('test bootstrap');exit;
        // Add module URL rules.
        $app->urlManager->addRules(
            [
                '<_a:(login|signup|activation|recovery|recovery-confirmation|resend|fileapi-upload)>' => 'users/guest/<_a>',
                '<_a:logout>' => 'users/user/<_a>',
                '<_a:email>' => 'users/default/<_a>',
                'my/settings/<_a:[\w\-]+>' => 'users/user/<_a>',
            ],
            false
        );

        // Add module I18N category.
        if (!isset($app->i18n->translations['custom_components/modules/users']) && !isset($app->i18n->translations['custom_components/modules/*'])) {
            $app->i18n->translations['custom_components/modules/users'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@custom_components/modules/users/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'custom_components/modules/users' => 'users.php',
                ]
            ];
        }
    }
}
