<?php
declare(strict_types=1);

use App\Application;

require_once "vendor/autoload.php";
$result = new Application();
echo number_format($result->calculate(), 2) . " " . $result->getTargetCurrency() . PHP_EOL;
