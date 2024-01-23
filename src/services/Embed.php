<?php

namespace nasarbashag\myfatoorah\services;

use Yii;
use yii\httpclient\Client;
use yii\httpclient\Request;

class Embed
{
    /**
     * Collect all the value from params files from your project
     */
    public $Token;
    public $Url;
    public $SuccessUrl;
    public $ErrorUrl;
    public $Currency;


    public function __construct()
    {
        $this->Token =  Yii::$app->params['nbMyFatoorah']['Token'];
        $this->Url =  Yii::$app->params['nbMyFatoorah']['Url'];
        $this->SuccessUrl =  Yii::$app->params['nbMyFatoorah']['SuccessUrl'];
        $this->ErrorUrl =  Yii::$app->params['nbMyFatoorah']['ErrorUrl'];
        $this->Currency =  Yii::$app->params['nbMyFatoorah']['Currency'];
    }


    public function initiatePayment($amount = 0.00, $currencyIso = "kwd")
    {





        $client = new Client();
        $response = $client->createRequest()
            ->setHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $this->Token"
            ])
            ->setFormat(Client::FORMAT_JSON)
            ->setMethod('POST')
            ->setUrl($this->Url . "InitiatePayment")
            ->setData(["InvoiceAmount" => $amount,  "CurrencyIso" => $currencyIso])
            ->send();
        // if ($response->isOk) {
        return ($response);
        // }

    }

    public function executePayment()
    {
        dd(
            $this->Token,
            $this->Url,
            $this->SuccessUrl,
            $this->ErrorUrl,
            $this->Currency,
        );
    }
}
