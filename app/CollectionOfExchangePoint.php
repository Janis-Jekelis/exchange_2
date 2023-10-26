<?php
declare(strict_types=1);

namespace App;

class CollectionOfExchangePoint
{
    private array $exchangePoints;
       public function __construct(string $targetCurrency, string $baseCurrency)
    {
        $this->targetCurrency = $targetCurrency;
        $this->baseCurrency = $baseCurrency;
        $this->exchangePoints = [];
        $this->exchangePoints[] = new ExchangePoint(
            "freecurrencyapi.com",
            (json_decode(file_get_contents(
                "https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_CZIkIME6mCqN4cQb9Vx3qS1FyEbCsqjS9g28RAhD&currencies=$targetCurrency&base_currency=$baseCurrency"
            )))->data->{$targetCurrency}
        );
        $this->exchangePoints[] = new ExchangePoint(
            "exchangerate-api.com",
            (json_decode(file_get_contents(
                "https://v6.exchangerate-api.com/v6/e544545c8bb68efcf7e3d265/pair/$baseCurrency/$targetCurrency"
            )))->conversion_rate
        );
        $this->exchangePoints[] = new ExchangePoint(
            "currencyfreaks.com",
            (1 / (json_decode(file_get_contents(
                    "https://api.currencyfreaks.com/v2.0/rates/latest?apikey=b6ba6becbeb34d9bab37a725234042a4"
                )))->rates->{$baseCurrency}) *
            ((json_decode(file_get_contents(
                "https://api.currencyfreaks.com/v2.0/rates/latest?apikey=b6ba6becbeb34d9bab37a725234042a4"
            )))->rates->{$targetCurrency})
        );
    }
    public function getExchangePoints(): array
    {
        return $this->exchangePoints;
    }
}
