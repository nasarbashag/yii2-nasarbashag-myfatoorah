# Yii2 MyFatoorah Payment Gateway by Nasar basha

## Introduction

Yii2 MyFatoorah is a Yii2 extension that allows you to easily integrate the MyFatoorah payment gateway into your Yii2 applications. This package simplifies the process of handling payments through MyFatoorah, providing a seamless experience for Yii2 developers.

## Installation

You can install this package using [Composer](https://getcomposer.org/):

```bash
composer require nasarbashag/yii2-nasarbashag-myfatoorah
```

## Add default values in params.php

```php
....
 "nbMyFatoorah" => [
        'Token' => "Occaecat non adipisicing velit officia reprehenderit non non ea velit ad minim.",
        'Url' => "Occaecat non adipisicing velit officia reprehenderit non non ea velit ad minim.",
        'SuccessUrl' => "Occaecat non adipisicing velit officia reprehenderit non non ea velit ad minim.",
        'ErrorUrl' => "Occaecat non adipisicing velit officia reprehenderit non non ea velit ad minim.",
        'Currency' => "Occaecat non adipisicing velit officia reprehenderit non non ea velit ad minim.",
    ],
...
```

## Initiate payment

```php
$initPayment = new Embed();
$result = $initPayment->initiatePayment(amount: 100.00, currentcyIso : "KWD");
// this result will all the payment methods
```
