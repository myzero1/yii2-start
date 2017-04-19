<?php

namespace custom_components\themes;

use yii\base\BootstrapInterface;

/**
 * Themes bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add themes I18N category.
        if (!isset($app->i18n->translations['custom_components/themes/admin*']) && !isset($app->i18n->translations['custom_components/themes/*']) && !isset($app->i18n->translations['custom_components/*'])) {
            $app->i18n->translations['custom_components/themes/admin*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@custom_components/themes/admin/messages',
                'forceTranslation' => false,
                'fileMap' => [
                    'admin' => 'admin.php',
                    'widgets/box' => 'box.php'
                ]
            ];
        }
        if (!isset($app->i18n->translations['custom_components/themes/site*']) && !isset($app->i18n->translations['custom_components/themes/*']) && !isset($app->i18n->translations['custom_components/*'])) {
            $app->i18n->translations['custom_components/themes/site*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@custom_components/themes/site/messages',
                'forceTranslation' => false,
                'fileMap' => [
                    'site' => 'site.php',
                ]
            ];
        }

        // exec php in string
        $app->params['menu'] = $this->execPhpCode($app->params['menu'], $sFlag = 'Yii::');
    }


    /**
     * execPhpCode.
     *
     * @param array $aMemus the message menu.
     * @param string $aFlags the php flags. //Yii::
     *
     * @return array the execed menu.
     */
    public static function execPhpCode(array $aMemus, $sFlag = 'Yii::')
    {
        foreach ($aMemus as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    if (is_array($v)) {
                        foreach ($v as $m => $n) {
                            if (is_array($n)) {
                                foreach ($n as $o => $p) {
                                    if (is_array($p)) {
                                        
                                    } elseif (strrpos($p, $sFlag) !== FALSE) {
                                        $tem = '';
                                        eval("\$tem = $p;");
                                        $aMemus[$key][$k][$m][$o] = $tem;
                                    }
                                }
                            } elseif (strrpos($n, $sFlag) !== FALSE) {
                                $tem = '';
                                eval("\$tem = $n;");
                                $aMemus[$key][$k][$m] = $tem;
                            }
                        }
                    } else if (strrpos($v, $sFlag) !== FALSE) {
                        $tem = '';
                        eval("\$tem = $v;");
                        $aMemus[$key][$k] = $tem;
                    }
                }
            } else if (strrpos($value, $sFlag) !== FALSE) {
                $tem = '';
                eval("\$tem = $value;");
                $aMemus[$key] = $tem;
            }
        }
        return $aMemus;
    }

}
