<?php
declare(strict_types=1);

use App\Converter;

require_once "vendor/autoload.php";
$request = new Converter();
$rates=$request->calculate();
foreach ($rates as $address=>$value){
    echo $address . "  " . number_format($value,2). " " .  $request->getTargetCurrency();
   if ($value==max($rates))echo "  (Recommended)";
   echo PHP_EOL;
}


