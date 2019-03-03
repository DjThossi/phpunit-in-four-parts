<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Reader;

use DjThossi\PHPUnit\Domain\Card;

interface CardReader
{
    public function getCard(): Card;
}
