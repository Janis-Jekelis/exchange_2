<?php
declare(strict_types=1);

namespace App;
class Currencies
{
    private array $currencies;
    private float $rates;

    public function __construct()
    {
        $allCurrencies = json_decode(file_get_contents(
            "https://api.freecurrencyapi.com/v1/currencies?apikey=fca_live_CZIkIME6mCqN4cQb9Vx3qS1FyEbCsqjS9g28RAhD&currencies="
        ));
        foreach ($allCurrencies->data as $currency) {
            $this->currencies[] = $currency->code;
        }

    }

    public function getCurrencies(): array
    {
        return $this->currencies;
    }

    public function getRates(string $base, string $target): float
    {
        $request = json_decode(file_get_contents(
            "https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_CZIkIME6mCqN4cQb9Vx3qS1FyEbCsqjS9g28RAhD&currencies=$target&base_currency=$base"
        ));
        $this->rates = $request->data->{$target};
        return $this->rates;
    }
}
