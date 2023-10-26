<?php
declare(strict_types=1);
require_once "vendor/autoload.php";
use App\Converter;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$request = new Converter();
$rates=$request->calculate();
foreach ($rates as $address=>$value){
    echo $address . "  " . number_format($value,2). " " .  $request->getTargetCurrency();
   if ($value==max($rates))echo "  (Recommended)";
   echo PHP_EOL;
}


