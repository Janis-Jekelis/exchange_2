<?php
declare(strict_types=1);

namespace App;
class Converter
{
    private array $exchangePoints;
    private string $baseCurrency;
    private string $targetCurrency;
    private int $amountIn;
    private array $amountOut;

    public function __construct()
    {
        $this->setBaseCurrency();
        $this->setTargetCurrency();
        $this->exchangePoints = (new CollectionOfExchangePoint(
            $this->targetCurrency, $this->baseCurrency
        ))->getExchangePoints();

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
        $this->amountIn = intVal($intVal);
        $this->baseCurrency = strtoupper($this->baseCurrency);
        if (!(is_numeric($this->amountIn))) exit("invalid input");
    }

    public function calculate(): array
    {
        foreach ($this->exchangePoints as $exchangePoint) {
            $this->amountOut[$exchangePoint->getAddress()] = ($this->amountIn) * $exchangePoint->getRates();
        }
        return $this->amountOut;
    }

    public function getTargetCurrency(): string
    {
        return $this->targetCurrency;
    }
}
