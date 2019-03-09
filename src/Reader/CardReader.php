<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Reader;

use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Domain\Sku;

interface CardReader
{
    public function getCard(Sku $sku): Card;
}
