<?php

// Interfaces
interface PaymentInterface
{
    public function payNow();
}

interface LoginInterface
{
    public function loginFirst();
}

class Paypal implements PaymentInterface, LoginInterface
{
    public function payNow()
    {
    }

    public function loginFirst()
    {
    }

    public function paymentProcess()
    {
        $this->loginFirst();
        $this->payNow();
    }
}

class BankTransfer implements PaymentInterface, LoginInterface
{
    public function payNow()
    {
    }

    public function loginFirst()
    {
    }

    public function paymentProcess()
    {
        $this->loginFirst();
        $this->payNow();
    }
}

class Visa implements PaymentInterface
{
    public function payNow()
    {
    }

    public function paymentProcess()
    {
        $this->payNow();
    }
}

class Cash implements PaymentInterface
{
    public function payNow()
    {
    }

    public function paymentProcess()
    {
        $this->payNow();
    }
}

class BuyProduct
{
    public function pay($paymentType)
    {
        $paymentType->paymentProcess();
    }

    public function onlinePay($paymentType)
    {
        $paymentType->paymentProcess();
    }
}

$paymentType = new Cash();
$buyProduct = new BuyProduct();
$buyProduct->pay($paymentType);
