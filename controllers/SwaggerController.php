<?php

namespace tanghengzhi\swagger\controllers;

use yii\rest\Controller;
use Yii;

class SwaggerController extends Controller
{
    public function actionJson()
    {
        $params = Yii::$app->params['apidoc']??[];
        $doc_dir[] = __DIR__;
        if(isset($params['scan_dir']) && is_array($params['scan_dir']))
        {
            foreach($params['scan_dir'] as $item)
            {
                $doc_dir[] = Yii::getAlias('@'.$item);
            }
        }
        try
        {
            $swagger =  \Swagger\scan($doc_dir);
            echo ($swagger);exit;
        }
        catch(\Exception $exception)
        {
            echo json_encode([$exception->getFile(),$exception->getMessage(),$exception->getLine()]);
        }
    }
}
