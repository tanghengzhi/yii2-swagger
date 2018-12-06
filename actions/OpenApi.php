<?php

namespace tanghengzhi\swagger\actions;

use yii\base\Action;
use Yii;

/**
 * @OA\Info(title="Yii2 Swagger Extension", version="0.0.2")
 * @OA\Get(
 *     path="/swagger/swagger/json",
 *     @OA\Response(response="200", description="Output in json format")
 * )
 */
class OpenApi extends Action {
    public function run()
    {
        $params = Yii::$app->params['swagger'] ?? [];

        if (isset($params['scan_dir']) && is_array($params['scan_dir'])) {
            foreach($params['scan_dir'] as $item) {
                $doc_dir[] = Yii::getAlias('@'.$item);
            }
        } else {
            $doc_dir[] = __DIR__;
        }
        try
        {
            $openapi = \OpenApi\scan($doc_dir);
            header("Access-Control-Allow-Origin: *");
            header('Content-Type: application/json');
            echo $openapi->toJson();
            exit;
        }
        catch(\Exception $exception)
        {
            echo json_encode([$exception->getFile(), $exception->getMessage(), $exception->getLine()]);
        }
    }
}