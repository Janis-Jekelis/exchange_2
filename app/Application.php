<?php
declare(strict_types=1);

namespace App;
class Application
{
    private array $currencyToExchange;
    private string $targetCurrency;

    public function __construct()
    {
        $this->setCurrencyToExchange();
        $this->setTargetCurrency();

    }

    public function calculate(): float
    {
        $rates = (new Currencies)->getRates($this->currencyToExchange[1], $this->targetCurrency);
        return ($this->currencyToExchange[0] * 100 * $rates) / 100;
    }

    public function getTargetCurrency(): string
    {
        return $this->targetCurrency;
    }


    private function setCurrencyToExchange(): void
    {
        echo "available currencies:" . PHP_EOL;
        echo implode(", ", ((new Currencies)->getCurrencies())) . PHP_EOL;
        $this->currencyToExchange = explode(
            " ", readline("please input amount and currency to exchange(ex. 100 USD):"
        ));
        $this->currencyToExchange[1] = strtoupper($this->currencyToExchange[1]);
        if (!(count($this->currencyToExchange) == 2)) exit("invalid input");
        if (!(is_numeric($this->currencyToExchange[0]))) exit("invalid input");
        if (!(in_array($this->currencyToExchange[1], ((new Currencies)->getCurrencies())))) exit("invalid input");
    }


    private function setTargetCurrency(): void
    {
        $this->targetCurrency = readline("please input currency you wish to get:");
        $this->targetCurrency = strtoupper($this->targetCurrency);
        if (!(in_array($this->targetCurrency, ((new Currencies)->getCurrencies())))) exit("invalid input");
    }

}
