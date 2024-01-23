<?php

namespace nasarbashag\myfatoorah\services;

use Yii;

class Embed
{
    /**
     * @property String $url
     */
    const MF_URL = "";
    const MF_TOKEN = "";


    public function executePayment()
    {
        return Yii::$app->params['myfatoorah_token'] ?? "Token Not found";
    }
}
