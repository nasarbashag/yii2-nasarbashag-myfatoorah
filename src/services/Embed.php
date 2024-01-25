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


    public function initiatePayment($amount = 0.00, $currencyIso = "KWD")
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
        return ($response->content);
        // }

    }

    /**
     * Execute payment ~ this will process the data and generate a payment link
     *
     * @return void
     */
    public function executePayment()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer $this->Token"
            ])
            ->setFormat(Client::FORMAT_JSON)
            ->setMethod('POST')
            ->setUrl($this->Url . "ExecutePayment")
            ->setData([
                "PaymentMethodId" => 0,
                "SessionId" => "string",
                "RecurringModel" => [
                    "RecurringType" => "string",
                    "IntervalDays" => 0,
                    "Iteration" => 0,
                    "RetryCount" => 0
                ],
                "CustomerName" => "string",
                "DisplayCurrencyIso" => "string",
                "MobileCountryCode" => "string",
                "CustomerMobile" => "string",
                "CustomerEmail" => "string",
                "InvoiceValue" => 0,
                "Language" => "string",
                "CustomerReference" => "string",
                "CustomerCivilId" => "string",
                "UserDefinedField" => "string",
                "CallBackUrl" => "string",
                "ErrorUrl" => "string",
                "CustomerAddress" => [
                    "Block" => "string",
                    "Street" => "string",
                    "HouseBuildingNo" => "string",
                    "AddressInstructions" => "string"
                ],
                "ExpiryDate" => "2023-11-16T10=>58=>49.852Z",
                "InvoiceItems" => [
                    [
                        "ItemName" => "string",
                        "Quantity" => 0,
                        "UnitPrice" => 0,
                        "Weight" => 0,
                        "Width" => 0,
                        "Height" => 0,
                        "Depth" => 0
                    ]
                ],
                "ShippingMethod" => 1,
                "ShippingConsignee" => [
                    "PersonName" => "string",
                    "Mobile" => "string",
                    "EmailAddress" => "string",
                    "LineAddress" => "string",
                    "CityName" => "string",
                    "PostalCode" => "string",
                    "CountryCode" => "string"
                ],
                "Suppliers" => [
                    [
                        "SupplierCode" => 0,
                        "ProposedShare" => 0,
                        "InvoiceShare" => 0
                    ]
                ],
                "ProcessingDetails" => [
                    "AutoCapture" => true,
                    "Bypass3DS" => true
                ]
            ])
            ->send();
        return ($response->content);
    }
}
