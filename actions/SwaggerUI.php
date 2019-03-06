<?php

namespace tanghengzhi\swagger\actions;

class SwaggerUI extends \yii\base\Action {
    public function run() {
        $this->controller->layout = false;
        return $this->controller->render("swagger-ui.php");
    }
}