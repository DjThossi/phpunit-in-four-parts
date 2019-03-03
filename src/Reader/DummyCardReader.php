<?php

declare(strict_types=1);
namespace DjThossi\PHPUnit\Reader;

use DjThossi\PHPUnit\Domain\Card;
use DjThossi\PHPUnit\Domain\Format;
use DjThossi\PHPUnit\Domain\Name;

class DummyCardReader implements CardReader
{
    /**
     * @var ColorReader
     */
    private $colorReader;

    /**
     * @var OptionReader
     */
    private $optionReader;

    public function __construct(ColorReader $colorReader, OptionReader $optionReader)
    {
        $this->colorReader = $colorReader;
        $this->optionReader = $optionReader;
    }

    public function getCard(): Card
    {
        return new Card(
            new Name('30th Birthday invitation'),
            new Format('F020'),
            $this->colorReader->getColors(),
            $this->optionReader->getOptions()
        );
    }
}
