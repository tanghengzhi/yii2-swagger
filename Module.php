<?php
namespace tanghengzhi\swagger;

/**
 * swagger module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'tanghengzhi\swagger\controllers';
    
    /**
     * @inheritdoc
     */
    public $defaultRoute = 'swagger/json';
}