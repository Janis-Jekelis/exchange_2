<?php
declare(strict_types=1);

namespace App;
class Converter
{
    private array $rates;
    private string $baseCurrency;
    private string $targetCurrency;
    private int $amountIn;
    private array $amountOut;

    public function __construct()
    {
        $this->setBaseCurrency();
        $this->setTargetCurrency();
        $request = new CollectionOfExchangePoint($this->targetCurrency, $this->baseCurrency);
        foreach ($request->getExchangePoints() as $exchangePoint) {
            $this->rates[$exchangePoint->getAddress()] = $exchangePoint->getRates();
        }
    }


    private function setTargetCurrency(): void
    {
        $this->targetCurrency = readline("please input currency you wish to get:");
        $this->targetCurrency = strtoupper($this->targetCurrency);
    }

    private function setBaseCurrency(): void
    {
        [$intVal, $this->baseCurrency] = explode(
            " ", readline("please input amount and currency to exchange(ex. 100 USD):"
        ));

      $this->amountIn=intVal($intVal);
        $this->baseCurrency = strtoupper($this->baseCurrency);
        if (!(is_numeric($this->amountIn))) exit("invalid input");
    }
    public function calculate(): array
    {
        foreach ($this->rates as $address => $rate) {
            $this->amountOut[$address] = ($this->amountIn) * $rate;
        }
        return $this->amountOut;
    }
        public function getTargetCurrency(): string
    {
        return $this->targetCurrency;
    }
}
