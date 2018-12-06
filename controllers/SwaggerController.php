<?php

namespace tanghengzhi\swagger\controllers;

use yii\web\Controller;

class SwaggerController extends Controller
{
    public function actions()
    {
        return [
            'json' => 'tanghengzhi\swagger\actions\OpenApi'
        ];
    }
}
