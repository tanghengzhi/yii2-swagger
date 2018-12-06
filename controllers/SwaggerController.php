<?php

namespace tanghengzhi\swagger\controllers;

use yii\rest\Controller;
use Yii;

/**
 * @OA\Info(title="My First API", version="0.1")
 */
class SwaggerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/swagger/swagger/json",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function actionJson()
    {
        $params = Yii::$app->params['swagger'] ?? [];
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
            $openapi = \OpenApi\scan($doc_dir);
            header('Content-Type: application/json');
            echo $openapi->toJson();
        }
        catch(\Exception $exception)
        {
            echo json_encode([$exception->getFile(), $exception->getMessage(), $exception->getLine()]);
        }
    }
}
