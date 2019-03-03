<?php

declare(strict_types=1);

use DjThossi\PHPUnit\Factory;

require_once __DIR__ . '/../vendor/autoload.php';

$factory = new Factory();
$card = $factory->createCardReader()->getCard();

echo "<h1>Success!!!</h1> <br \>\n";
var_dump($card);