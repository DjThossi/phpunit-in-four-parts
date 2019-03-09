<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit;

use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Reader\CardReader;

class Application
{
    /**
     * @var CardReader
     */
    private $cardReader;

    public function __construct(CardReader $cardReader)
    {
        $this->cardReader = $cardReader;
    }

    public function run(Request $request): Card
    {
        return $this->cardReader->getCard($request->getSku());
    }
}
