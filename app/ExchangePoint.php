<?php
declare(strict_types=1);

namespace App;

class ExchangePoint
{
    private string $address;
    private float $rates;

    public function __construct(string $address, float $rates)
    {
        $this->address = $address;
        $this->rates = $rates;
    }

    public function getAddress(): string
    {
        return $this->address;
    }


    public function getRates(): float
    {
        return $this->rates;
    }

}