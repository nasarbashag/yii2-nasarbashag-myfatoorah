<?php

namespace nasarbashag\myfatoorah\services;

use Yii;

class Embed
{
    /**
     * Collect all the value from params files from your project
     */
    public $myFatoorahToken;
    public $myFatoorahUrl;
    public $myFatoorahSuccessUrl;
    public $myFatoorahErrorUrl;
    public $myFatoorahCurrency;


    public function __construct()
    {
        $this->myFatoorahToken =  Yii::$app->params['myfatoorahToken'];
        $this->myFatoorahUrl =  Yii::$app->params['myfatoorahUrl'];
        $this->myFatoorahSuccessUrl =  Yii::$app->params['myfatoorahSuccessUrl'];
        $this->myFatoorahErrorUrl =  Yii::$app->params['myfatoorahErrorUrl'];
        $this->myFatoorahCurrency =  Yii::$app->params['myfatoorahCurrency'];
    }

    public function executePayment()
    {
        dd(
            $this->myFatoorahToken,
            $this->myFatoorahUrl,
            $this->myFatoorahSuccessUrl,
            $this->myFatoorahErrorUrl,
            $this->myFatoorahCurrency,
        );
    }
}
