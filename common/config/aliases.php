<?php

/**
 * Set all application aliases.
 */

Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('statics', dirname(dirname(__DIR__)) . '/statics');
Yii::setAlias('root', dirname(dirname(__DIR__)));

Yii::setAlias('custom_components', dirname(dirname(__DIR__)) . '/custom-components');
