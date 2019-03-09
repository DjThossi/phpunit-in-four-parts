<?php

declare(strict_types=1);

use DjThossi\PHPUnit\Factory;
use DjThossi\PHPUnit\Request;

require_once __DIR__ . '/../vendor/autoload.php';

$request = Request::fromSuperGlobals();

$factory = new Factory();
$application = $factory->createApplication();
$card = $application->run($request);

echo "<h1>Success!!!</h1> <br \>\n";
var_dump($card);